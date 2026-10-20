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
        $host = '127.0.0.1';

        $connection = @fsockopen($host, $port, $errno, $errstr, 1.0);

        if (is_resource($connection)) {
            fclose($connection);
            return true;
        }

        return false;
    }

    /**
     * Start Laravel Reverb in the background.
     */
    public function startReverb(): array
    {
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

        $command = sprintf(
            'cd %s && nohup %s %s reverb:start --host=%s --port=%d > %s 2>&1 & echo $!',
            escapeshellarg(base_path()),
            escapeshellcmd($php),
            escapeshellcmd($artisan),
            escapeshellarg($host),
            $port,
            escapeshellcmd($logFile)
        );

        @exec($command, $output);
        $pid = isset($output[0]) ? trim($output[0]) : null;

        // Dynamically wait for Reverb to bind to port (up to 1.5s in 100ms intervals)
        $running = false;
        for ($i = 0; $i < 15; $i++) {
            usleep(100000);
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
    }

    /**
     * Stop Laravel Reverb WebSocket server.
     */
    public function stopReverb(): array
    {
        @exec("pkill -f 'reverb:start'");
        $running = true;
        for ($i = 0; $i < 10; $i++) {
            usleep(50000);
            if (!$this->isReverbRunning()) {
                $running = false;
                break;
            }
        }

        return [
            'success' => !$running,
            'message' => !$running ? 'Laravel Reverb stopped.' : 'Failed to stop Laravel Reverb.',
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

        $command = sprintf(
            'cd %s && nohup %s %s > %s 2>&1 & echo $!',
            escapeshellarg(base_path()),
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
    }

    /**
     * Stop the WhatsApp Gateway.
     */
    public function stopWhatsApp(): array
    {
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
        $version = PHP_MAJOR_VERSION . PHP_MINOR_VERSION;

        $candidates = [
            defined('PHP_BINDIR') ? PHP_BINDIR . '/php' : null,
            defined('PHP_BINARY') && is_executable(PHP_BINARY) && !str_contains(PHP_BINARY, 'fpm') ? PHP_BINARY : null,
            "/opt/cpanel/ea-php{$version}/root/usr/bin/php",
            "/usr/local/bin/ea-php{$version}",
            '/opt/cpanel/ea-php84/root/usr/bin/php',
            '/opt/cpanel/ea-php83/root/usr/bin/php',
            '/opt/cpanel/ea-php82/root/usr/bin/php',
            '/usr/local/bin/php',
            '/usr/bin/php',
            '/Applications/MAMP/bin/php/php8.4.1/bin/php',
            'php',
        ];

        foreach ($candidates as $candidate) {
            if ($candidate && $candidate !== 'php' && file_exists($candidate) && is_executable($candidate)) {
                return $candidate;
            }
        }

        return 'php';
    }

    /**
     * Resolve the Node.js executable path across environments.
     */
    protected function resolveNodeBinary(): string
    {
        // Check cPanel virtualenv node path first if present
        $candidates = [
            'node',
            '/usr/local/bin/node',
            '/usr/bin/node',
            '/opt/homebrew/bin/node',
            '/home/' . get_current_user() . '/nodevenv/public_html/7series/24/bin/node',
            '/home/' . get_current_user() . '/nodevenv/public_html/7series/20/bin/node',
        ];

        foreach ($candidates as $candidate) {
            if ($candidate === 'node') {
                $output = @shell_exec('which node 2>/dev/null');
                if (!empty($output)) {
                    return trim($output);
                }
            } elseif (file_exists($candidate) && is_executable($candidate)) {
                return $candidate;
            }
        }

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
