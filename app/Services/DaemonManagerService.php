<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DaemonManagerService
{
    /**
     * Check if Laravel Reverb WebSocket server is running and accepting connections.
     */
    public function isReverbRunning(): bool
    {
        $port = (int) config('reverb.servers.reverb.port', 8080);

        // 1. Direct socket verification: probe port 8080 specifically for Laravel Reverb
        $fp = @fsockopen('127.0.0.1', $port, $errno, $errstr, 0.3);
        if ($fp) {
            stream_set_timeout($fp, 0, 300000); // 300ms
            fwrite($fp, "GET / HTTP/1.1\r\nHost: 127.0.0.1:{$port}\r\nConnection: close\r\n\r\n");
            $response = '';
            while (!feof($fp)) {
                $chunk = fgets($fp, 512);
                if ($chunk === false) break;
                $response .= $chunk;
                if (str_contains($response, "\r\n\r\n")) break;
            }
            fclose($fp);

            if (str_contains($response, 'Laravel Reverb') || str_contains($response, 'X-Powered-By: Laravel Reverb')) {
                return true;
            }
        }

        // 2. Secondary check: verify if process exists in /proc or via pgrep
        $pids = $this->findPidsByKeyword('reverb:start');
        if (!empty($pids)) {
            // Check if socket is open/binding
            $sock = @fsockopen('127.0.0.1', $port, $errno, $errstr, 0.2);
            if ($sock) {
                fclose($sock);
                return true;
            }
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
            @unlink(storage_path('framework/reverb.pid'));

            if ($this->isReverbRunning()) {
                return [
                    'success' => true,
                    'message' => 'Laravel Reverb is already running.',
                ];
            }

            $script = base_path('scripts/run_reverb.sh');
            @chmod($script, 0755);

            // 1. Primary start mechanism via run_reverb.sh start
            @exec("bash " . escapeshellarg($script) . " start > /dev/null 2>&1 &");

            // 2. Poll for Reverb to be running (up to 3.5s in 150ms intervals)
            $running = false;
            for ($i = 0; $i < 24; $i++) {
                usleep(150000);
                if ($this->isReverbRunning()) {
                    $running = true;
                    break;
                }
            }

            // 3. Fallback: direct nohup execution with resolved CLI PHP
            if (!$running) {
                $php = $this->resolvePhpBinary();
                $artisan = base_path('artisan');
                $port = (int) config('reverb.servers.reverb.port', 8080);
                $logFile = storage_path('logs/reverb.log');

                $command = sprintf(
                    'cd %s && nohup %s %s reverb:start < /dev/null >> %s 2>&1 & echo $!',
                    escapeshellarg(base_path()),
                    escapeshellcmd($php),
                    escapeshellcmd($artisan),
                    escapeshellcmd($logFile)
                );

                @exec($command, $output);
                $pid = isset($output[0]) ? trim($output[0]) : null;
                if ($pid && is_numeric($pid)) {
                    @file_put_contents(storage_path('framework/reverb.pid'), $pid);
                }

                for ($i = 0; $i < 16; $i++) {
                    usleep(150000);
                    if ($this->isReverbRunning()) {
                        $running = true;
                        break;
                    }
                }
            }

            $errorMessage = 'Failed to start Laravel Reverb. Please check storage/logs/reverb.log';
            $logFile = storage_path('logs/reverb.log');
            if (!$running && file_exists($logFile)) {
                $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $logSnippet = implode(' ', array_slice($lines, -5));

                if (str_contains($logSnippet, 'no commands defined in the "reverb" namespace')) {
                    $errorMessage = 'Reverb is not installed in production vendor. Run: composer install --no-dev';
                } elseif (str_contains($logSnippet, 'Address already in use')) {
                    $errorMessage = "Port 8080 is already bound by another process.";
                } elseif (!empty($logSnippet)) {
                    $errorMessage = 'Startup error: ' . substr($logSnippet, 0, 120);
                }
            }

            return [
                'success' => $running,
                'message' => $running
                    ? 'Laravel Reverb started successfully on port 8080.'
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

            $script = base_path('scripts/run_reverb.sh');
            @chmod($script, 0755);

            // 1. Run stop via run_reverb.sh
            @exec("bash " . escapeshellarg($script) . " stop 2>/dev/null");

            // 2. Direct backup termination
            $pidFile = storage_path('framework/reverb.pid');
            if (file_exists($pidFile)) {
                $savedPid = (int) trim((string) @file_get_contents($pidFile));
                if ($savedPid > 1) {
                    $this->killPids([$savedPid]);
                }
                @unlink($pidFile);
            }

            $pids = $this->findPidsByKeyword('reverb:start');
            if (!empty($pids)) {
                $this->killPids($pids);
            }

            // 3. Poll for shutdown (up to 4.0s in 200ms intervals to allow Reverb to gracefully flush connections)
            $running = true;
            for ($i = 0; $i < 20; $i++) {
                usleep(200000);
                if (!$this->isReverbRunning()) {
                    $running = false;
                    break;
                }
                // If still running after 2 seconds, force kill
                if ($i === 10) {
                    @exec("pkill -9 -f 'reverb:start' 2>/dev/null");
                    @exec("fuser -k -9 8080/tcp 2>/dev/null");
                }
            }

            @unlink(storage_path('framework/reverb.pid'));

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
     * Restart Laravel Reverb WebSocket server.
     */
    public function restartReverb(): array
    {
        $script = base_path('scripts/run_reverb.sh');
        @chmod($script, 0755);
        @unlink(storage_path('framework/reverb.stopped'));
        @unlink(storage_path('framework/reverb.pid'));

        // 1. Run restart via unified script
        @exec("bash " . escapeshellarg($script) . " restart > /dev/null 2>&1 &");

        // 2. Poll for Reverb to respond to the socket probe (up to 4.5 seconds)
        $running = false;
        for ($i = 0; $i < 25; $i++) {
            usleep(180000);
            if ($this->isReverbRunning()) {
                $running = true;
                break;
            }
        }

        // 3. Fallback: full stop and clean start
        if (!$running) {
            $this->stopReverb();
            usleep(400000);
            return $this->startReverb();
        }

        return [
            'success' => true,
            'message' => 'Laravel Reverb restarted successfully on port 8080.',
        ];
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
            '/usr/bin/ea-php84',
            '/usr/bin/ea-php83',
            '/usr/bin/ea-php82',
        ];

        foreach ($cpanelCandidates as $candidate) {
            if (@file_exists($candidate)) {
                return $candidate;
            }
        }

        // 2. Query shell for ea-php CLI binaries
        foreach (['ea-php84', 'ea-php83', 'ea-php82', 'php'] as $bin) {
            try {
                $which = @shell_exec("which {$bin} 2>/dev/null");
                if ($which && trim($which)) {
                    $trimmed = trim($which);
                    if (!str_contains($trimmed, 'lsphp') && !str_contains($trimmed, 'php-fpm')) {
                        return $trimmed;
                    }
                }
            } catch (\Throwable) {}
        }

        // 3. Try PHP_BINARY only if CLI SAPI
        if (PHP_SAPI === 'cli' && PHP_VERSION_ID >= 80200 && PHP_BINARY && !str_contains(PHP_BINARY, 'lsphp') && !str_contains(PHP_BINARY, 'php-fpm')) {
            return PHP_BINARY;
        }

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
