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
        $port = (int) config('reverb.servers.reverb.port', 8080);
        $artisan = base_path('artisan');

        // 1. Check if the specific 7series artisan process is alive
        $hasProcess = false;
        try {
            $pids = @shell_exec("pgrep -f " . escapeshellarg($artisan . ' reverb:start') . " 2>/dev/null");
            if ($pids && trim($pids)) {
                $hasProcess = true;
            }
        } catch (\Throwable) {}

        // 2. Check socket connection across loopback and local hosts
        $hasSocket = false;
        foreach (['127.0.0.1', '0.0.0.0', 'localhost'] as $host) {
            $connection = @fsockopen($host, $port, $errno, $errstr, 0.4);
            if (is_resource($connection)) {
                fclose($connection);
                $hasSocket = true;
                break;
            }
        }

        return $hasProcess || $hasSocket;
    }

    /**
     * Start Laravel Reverb in the background.
     */
    public function startReverb(): array
    {
        try {
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
            $artisan = base_path('artisan');
            @exec("pkill -f " . escapeshellarg($artisan . ' reverb:start'));
            $running = true;
            for ($i = 0; $i < 10; $i++) {
                usleep(50000);
                if (!$this->isReverbRunning()) {
                    $running = false;
                    break;
                }
            }

            if ($running) {
                @exec("pkill -9 -f " . escapeshellarg($artisan . ' reverb:start'));
                $port = (int) config('reverb.servers.reverb.port', 8080);
                @exec("lsof -t -i:{$port} | xargs kill -9 2>/dev/null");
                usleep(100000);
                $running = $this->isReverbRunning();
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
            @exec("pkill -f 'whatsapp-gateway/server.js'");
            @exec("lsof -t -i:3000 | xargs kill -9 2>/dev/null");
            $status = ['running' => true];
            for ($i = 0; $i < 10; $i++) {
                usleep(50000);
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
     * Resolve the PHP CLI binary across environments (MAMP, cPanel ea-php, VPS).
     */
    protected function resolvePhpBinary(): string
    {
        // 1. Try to query the system shell for the CLI PHP binary
        try {
            $which = @shell_exec('which php 2>/dev/null');
            if ($which && trim($which)) {
                $trimmed = trim($which);
                if (!str_contains($trimmed, 'php-fpm')) {
                    return $trimmed;
                }
            }
        } catch (\Throwable) {}

        // 2. Try cPanel version-specific ea-php binary via shell
        $version = PHP_MAJOR_VERSION . PHP_MINOR_VERSION;
        try {
            $which = @shell_exec("which ea-php{$version} 2>/dev/null");
            if ($which && trim($which)) {
                return trim($which);
            }
        } catch (\Throwable) {}

        // 3. Fallback to PHP_BINDIR if defined
        if (defined('PHP_BINDIR') && PHP_BINDIR) {
            $candidate = PHP_BINDIR . '/php';
            try {
                if (@file_exists($candidate)) {
                    return $candidate;
                }
            } catch (\Throwable) {}
        }

        // 4. Default to standard CLI command
        return 'php';
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
