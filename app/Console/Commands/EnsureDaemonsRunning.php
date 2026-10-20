<?php

namespace App\Console\Commands;

use App\Services\DaemonManagerService;
use Illuminate\Console\Command;

class EnsureDaemonsRunning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daemons:keepalive {--force : Force restart if not responding}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ensure Laravel Reverb WebSocket server and WhatsApp Gateway daemons are active';

    /**
     * Execute the console command.
     */
    public function handle(DaemonManagerService $manager): int
    {
        $this->info('Checking 7Series background services...');

        $results = $manager->ensureAllRunning();

        foreach ($results as $service => $result) {
            $status = $result['status'] ?? ($result['success'] ? 'running' : 'failed');
            $this->line(" - Service <fg=yellow>{$service}</>: <fg=green>{$status}</>");
        }

        $this->info('Daemons check complete.');

        return Command::SUCCESS;
    }
}
