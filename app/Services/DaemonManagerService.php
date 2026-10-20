<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DaemonManagerService
{
    /**
     * Check if Laravel Reverb WebSocket server is running.
     */
    public function isReverbRunning(): bool
    {
        // 1. Primary check: verify if any process contains 'reverb:start'
        $pids = $this->findPidsByKeyword('reverb:start');
        if (!empty($pids)) {
            return true;
        }

        // 2. Check saved PID file if present
        $pidFile = storage_path('framework/reverb.pid');
        if (file_exists($pidFile)) {
            $savedPid = (int) trim((string) @file_get_contents($pidFile));
            if ($this->isPidAlive($savedPid)) {
                return true;
            }
            @unlink($pidFile);
        }

        return false;
    }

    /**
     * Start Laravel Reverb in the background.
     */
    public function startReverb(): array
    {
        try {
            // Remove stopped watchdog barrier
            @unlink(storage_path('framework/reverb.stopped'));

            if ($this->isReverbRunning()) {
                return [
                    'success' => true,
                    'message' => 'Laravel Reverb is already running.',
                ];
            }

            $php = $this->resolvePhpBinary();
            $artisan = base_path('artisan');
            $port = (int) config('reverb.servers.reverb.port', 8080);
            $host = '0.0.0.0';
            $logFile = storage_path('logs/reverb.log');

            // Ensure log directory exists
            if (!file_exists(dirname($logFile))) {
                @mkdir(dirname($logFile), 0755, true);
            }

            // Detect setsid on Linux to detach from PHP-FPM process group
            $hasSetsid = !empty(trim((string) @shell_exec('which setsid 2>/dev/null')));
            $prefix = $hasSetsid ? 'setsid ' : 'nohup ';

            // Completely decouple stdio with < /dev/null to avoid SIGTERM from parent process cleanup
            $command = sprintf(
                'cd %s && %s%s %s reverb:start --host=%s --port=%d < /dev/null > %s 2>&1 & echo $!',
                escapeshellarg(base_path()),
                $prefix,
                escapeshellcmd($php),
                escapeshellcmd($artisan),
                escapeshellarg($host),
                $port,
                escapeshellcmd($logFile)
            );

            @exec($command, $output);
            $pid = isset($output[0]) ? trim($output[0]) : null;
            if ($pid && is_numeric($pid)) {
                @file_put_contents(storage_path('framework/reverb.pid'), $pid);
            }

            // Dynamically wait for Reverb to bind to port (up to 2.5s in 150ms intervals)
            $running = false;
            for ($i = 0; $i < 16; $i++) {
                usleep(150000);
                if ($this->isReverbRunning()) {
                    $running = true;
                    break;
                }
            }

            $errorMessage = 'Failed to start Laravel Reverb.';
            if (!$running && file_exists($logFile)) {
                $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $logSnippet = implode(' ', array_slice($lines, -5));

                if (str_contains($logSnippet, 'no commands defined in the "reverb" namespace')) {
                    $errorMessage = 'Reverb is not installed in production vendor. Run: composer install --no-dev';
                } elseif (str_contains($logSnippet, 'Address already in use')) {
                    $errorMessage = "Port {$port} is already bound by another process.";
                } elseif (!empty($logSnippet)) {
                    $errorMessage = 'Startup error: ' . substr($logSnippet, 0, 120);
                }
            }

            return [
                'success' => $running,
                'pid' => $pid,
                'message' => $running
                    ? 'Laravel Reverb started successfully on port ' . $port
                    : $errorMessage,
            ];
        } catch (\Throwable $e) {
            Log::error('[DaemonManager] startReverb exception: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Stop Laravel Reverb WebSocket server.
     */
    public function stopReverb(): array
    {
        try {
            // Signal watchdog cron to not auto-restart
            @file_put_contents(storage_path('framework/reverb.stopped'), time());

            // If already stopped, remove PID file and return immediately
            if (!$this->isReverbRunning()) {
                @unlink(storage_path('framework/reverb.pid'));
                return [
                    'success' => true,
                    'message' => 'Laravel Reverb is already stopped.',
                ];
            }

            $port = (int) config('reverb.servers.reverb.port', 8080);

            // 1. Kill saved PID from file if available
            $pidFile = storage_path('framework/reverb.pid');
            if (file_exists($pidFile)) {
                $savedPid = (int) trim((string) @file_get_contents($pidFile));
                if ($savedPid > 1) {
                    $this->killPids([$savedPid]);
                }
                @unlink($pidFile);
            }

            // 2. Kill all processes matching 'reverb:start'
            $pids = $this->findPidsByKeyword('reverb:start');
            if (!empty($pids)) {
                $this->killPids($pids);
            }

            // 3. Fallback kill commands
            @exec("pkill -9 -f 'reverb:start' 2>/dev/null");
            @exec("fuser -k -9 {$port}/tcp 2>/dev/null");
            @exec("lsof -t -i:{$port} | xargs kill -9 2>/dev/null");

            // 4. Poll until socket closes
            $running = true;
            for ($i = 0; $i < 12; $i++) {
                usleep(80000);
                if (!$this->isReverbRunning()) {
                    $running = false;
                    break;
                }
            }

            return [
                'success' => !$running,
                'message' => !$running ? 'Laravel Reverb stopped.' : 'Failed to stop Laravel Reverb.',
            ];
        } catch (\Throwable $e) {
            Log::error('[DaemonManager] stopReverb exception: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Get Reverb server details and recent logs.
     */
    public function getReverbDetails(): array
    {
        $port = (int) config('reverb.servers.reverb.port', 8080);
        $running = $this->isReverbRunning();
        $logFile = storage_path('logs/reverb.log');
        $logs = '';

        if (file_exists($logFile)) {
            $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $logs = implode("\n", array_slice($lines, -20));
        }

        return [
            'running' => $running,
            'port' => $port,
            'host' => config('reverb.servers.reverb.host', '0.0.0.0'),
            'app_id' => config('reverb.apps.apps.0.app_id'),
            'logs' => $logs,
        ];
    }

    /**
     * Get WhatsApp Gateway (Baileys) status and QR code.
     */
    public function getWhatsAppStatus(): array
    {
        $url = 'http://127.0.0.1:3000/status';

        try {
            $response = Http::timeout(1.2)->get($url);

            if ($response->successful()) {
                $data = $response->json();
                return [
                    'running' => true,
                    'status' => $data['status'] ?? 'unknown',
                    'user' => $data['user'] ?? null,
                    'has_qr' => (bool) ($data['has_qr'] ?? false),
                    'qr_data_url' => $data['qr_data_url'] ?? null,
                ];
            }
        } catch (\Throwable $e) {
            // Not responding
        }

        return [
            'running' => false,
            'status' => 'stopped',
            'user' => null,
            'has_qr' => false,
            'qr_data_url' => null,
        ];
    }

    /**
     * Start the WhatsApp Baileys gateway in the background.
     */
    public function startWhatsApp(): array
    {
        try {
            $current = $this->getWhatsAppStatus();
            if ($current['running']) {
                return [
                    'success' => true,
                    'message' => 'WhatsApp Gateway is already running.',
                ];
            }

            $serverJs = base_path('whatsapp-gateway/server.js');
            $logFile = storage_path('logs/whatsapp-gateway.log');

            // Locate node executable
            $node = $this->resolveNodeBinary();

            // Ensure log directory exists
            if (!file_exists(dirname($logFile))) {
                @mkdir(dirname($logFile), 0755, true);
            }

            // Detect setsid on Linux to detach from PHP-FPM process group
            $hasSetsid = !empty(trim((string) @shell_exec('which setsid 2>/dev/null')));
            $prefix = $hasSetsid ? 'setsid ' : 'nohup ';

            $command = sprintf(
                'cd %s && %s%s %s < /dev/null > %s 2>&1 & echo $!',
                escapeshellarg(base_path()),
                $prefix,
                escapeshellcmd($node),
                escapeshellcmd($serverJs),
                escapeshellcmd($logFile)
            );

            @exec($command, $output);
            $pid = isset($output[0]) ? trim($output[0]) : null;

            if ($pid && is_numeric($pid)) {
                @file_put_contents(storage_path('framework/whatsapp.pid'), $pid);
            }

            // Dynamically wait for WhatsApp to respond (up to 2.5s in 150ms intervals)
            $status = ['running' => false];
            for ($i = 0; $i < 16; $i++) {
                usleep(150000);
                $status = $this->getWhatsAppStatus();
                if ($status['running']) {
                    break;
                }
            }

            return [
                'success' => $status['running'],
                'pid' => $pid,
                'status' => $status,
                'message' => $status['running']
                    ? 'WhatsApp Gateway started successfully on port 3000.'
                    : 'Failed to start WhatsApp Gateway. Please check storage/logs/whatsapp-gateway.log',
            ];
        } catch (\Throwable $e) {
            Log::error('[DaemonManager] startWhatsApp exception: ' . $e->getMessage());
            return [
                'success' => false,
                'status' => ['running' => false, 'status' => 'error'],
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Stop the WhatsApp Gateway.
     */
    public function stopWhatsApp(): array
    {
        try {
            // 1. Kill saved PID from file if available
            $pidFile = storage_path('framework/whatsapp.pid');
            if (file_exists($pidFile)) {
                $savedPid = (int) trim((string) @file_get_contents($pidFile));
                if ($savedPid > 1) {
                    $this->killPids([$savedPid]);
                }
                @unlink($pidFile);
            }

            // 2. Kill all processes matching 'whatsapp-gateway' or 'server.js'
            $pids = array_unique(array_merge(
                $this->findPidsByKeyword('whatsapp-gateway/server.js'),
                $this->findPidsByKeyword('whatsapp-gateway')
            ));
            if (!empty($pids)) {
                $this->killPids($pids);
            }

            // 3. Fallback kill commands
            @exec("pkill -9 -f 'whatsapp-gateway' 2>/dev/null");
            @exec("fuser -k -9 3000/tcp 2>/dev/null");
            @exec("lsof -t -i:3000 | xargs kill -9 2>/dev/null");

            $status = ['running' => true];
            for ($i = 0; $i < 12; $i++) {
                usleep(80000);
                $status = $this->getWhatsAppStatus();
                if (!$status['running']) {
                    break;
                }
            }

            return [
                'success' => !$status['running'],
                'message' => !$status['running'] ? 'WhatsApp Gateway stopped.' : 'Failed to stop WhatsApp Gateway.',
            ];
        } catch (\Throwable $e) {
            Log::error('[DaemonManager] stopWhatsApp exception: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Get WhatsApp Gateway log snippet.
     */
    public function getWhatsAppLogs(): string
    {
        $logFile = storage_path('logs/whatsapp-gateway.log');
        if (!file_exists($logFile)) {
            return 'No logs generated yet.';
        }

        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        return implode("\n", array_slice($lines, -25));
    }

    /**
     * Find PIDs associated with a keyword by inspecting /proc and pgrep.
     */
    protected function findPidsByKeyword(string $keyword): array
    {
        $pids = [];

        // 1. Scan Linux /proc filesystem directly (independent of shell tools)
        if (is_dir('/proc')) {
            $dirs = @glob('/proc/[0-9]*');
            if ($dirs) {
                foreach ($dirs as $procDir) {
                    $pid = (int) basename($procDir);
                    if ($pid <= 1) continue;
                    $cmdlineFile = $procDir . '/cmdline';
                    if (@is_readable($cmdlineFile)) {
                        $cmd = @file_get_contents($cmdlineFile);
                        if ($cmd && str_contains($cmd, $keyword)) {
                            $pids[] = $pid;
                        }
                    }
                }
            }
        }

        // 2. Fallback to pgrep if available
        if (empty($pids)) {
            try {
                $output = @shell_exec("pgrep -f " . escapeshellarg($keyword) . " 2>/dev/null");
                if ($output) {
                    foreach (explode("\n", trim($output)) as $line) {
                        $p = (int) trim($line);
                        if ($p > 1 && !in_array($p, $pids, true)) {
                            $pids[] = $p;
                        }
                    }
                }
            } catch (\Throwable) {}
        }

        return array_values(array_unique($pids));
    }

    /**
     * Terminate a list of PIDs safely (SIGTERM then SIGKILL).
     */
    protected function killPids(array $pids): void
    {
        foreach ($pids as $pid) {
            if ($pid <= 1) continue;
            if (function_exists('posix_kill')) {
                @posix_kill($pid, 15); // SIGTERM
            }
            @exec("kill -15 {$pid} 2>/dev/null");
        }

        usleep(80000);

        foreach ($pids as $pid) {
            if ($pid <= 1) continue;
            if (function_exists('posix_kill')) {
                @posix_kill($pid, 9); // SIGKILL
            }
            @exec("kill -9 {$pid} 2>/dev/null");
        }
    }

    /**
     * Resolve the PHP CLI binary across environments (MAMP, cPanel ea-php, VPS).
     */
    protected function resolvePhpBinary(): string
    {
        // 1. Prioritize cPanel / EasyApache PHP >= 8.3 candidates
        $cpanelCandidates = [
            '/usr/local/bin/ea-php84',
            '/opt/cpanel/ea-php84/root/usr/bin/php',
            '/usr/local/bin/ea-php83',
            '/opt/cpanel/ea-php83/root/usr/bin/php',
            '/usr/local/bin/ea-php82',
            '/opt/cpanel/ea-php82/root/usr/bin/php',
        ];

        foreach ($cpanelCandidates as $candidate) {
            if (@file_exists($candidate) && @is_executable($candidate)) {
                return $candidate;
            }
        }

        // 2. Try PHP_BINARY if running via CLI and PHP version >= 8.2
        if (PHP_VERSION_ID >= 80200 && PHP_BINARY && !str_contains(PHP_BINARY, 'php-fpm')) {
            return PHP_BINARY;
        }

        // 3. Try to query the system shell for the CLI PHP binary
        try {
            $which = @shell_exec('which php 2>/dev/null');
            if ($which && trim($which)) {
                $trimmed = trim($which);
                if (!str_contains($trimmed, 'php-fpm')) {
                    return $trimmed;
                }
            }
        } catch (\Throwable) {}

        // 4. Default to standard CLI command
        return 'php';
    }

    /**
     * Check if a process ID is currently alive.
     */
    protected function isPidAlive(int $pid): bool
    {
        if ($pid <= 1) {
            return false;
        }

        if (function_exists('posix_kill')) {
            return @posix_kill($pid, 0);
        }

        if (is_dir('/proc')) {
            return file_exists("/proc/{$pid}");
        }

        $out = @shell_exec("kill -0 {$pid} 2>&1");
        return empty($out);
    }

    /**
     * Resolve the Node.js executable path across environments.
     */
    protected function resolveNodeBinary(): string
    {
        // 1. Ask shell for node
        try {
            $which = @shell_exec('which node 2>/dev/null');
            if ($which && trim($which)) {
                return trim($which);
            }
        } catch (\Throwable) {}

        // 2. Check cPanel virtualenv node path if in home directory
        try {
            $user = function_exists('get_current_user') ? get_current_user() : null;
            if ($user) {
                foreach (['24', '22', '20', '18'] as $nv) {
                    $candidate = "/home/{$user}/nodevenv/public_html/7series/{$nv}/bin/node";
                    if (@file_exists($candidate)) {
                        return $candidate;
                    }
                }
            }
        } catch (\Throwable) {}

        return 'node';
    }

    /**
     * Ensure both Reverb and WhatsApp are running (used by cron schedule).
     */
    public function ensureAllRunning(): array
    {
        $results = [];

        if (!$this->isReverbRunning()) {
            $results['reverb'] = $this->startReverb();
            Log::info('[DaemonManager] Reverb was offline. Revived automatically.');
        } else {
            $results['reverb'] = ['status' => 'already_running'];
        }

        $wa = $this->getWhatsAppStatus();
        if (!$wa['running']) {
            $results['whatsapp'] = $this->startWhatsApp();
            Log::info('[DaemonManager] WhatsApp Gateway was offline. Revived automatically.');
        } else {
            $results['whatsapp'] = ['status' => 'already_running'];
        }

        return $results;
    }
}
