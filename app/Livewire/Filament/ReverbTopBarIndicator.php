<?php

namespace App\Livewire\Filament;

use App\Services\DaemonManagerService;
use Filament\Notifications\Notification;
use Livewire\Component;

class ReverbTopBarIndicator extends Component
{
    public bool $isRunning = false;
    public bool $showModal = false;
    public bool $isProcessing = false;
    public string $actionMessage = '';

    public function mount(): void
    {
        $this->checkStatus();
    }

    public function checkStatus(): void
    {
        try {
            $this->isRunning = app(DaemonManagerService::class)->isReverbRunning();
        } catch (\Throwable $e) {
            $this->isRunning = false;
        }
    }

    public function toggleModal(): void
    {
        $this->checkStatus();
        $this->showModal = ! $this->showModal;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function startServer(): void
    {
        $this->isProcessing = true;
        $this->actionMessage = 'Starting Reverb WebSocket daemon...';

        try {
            $result = app(DaemonManagerService::class)->startReverb();
            $this->checkStatus();

            if ($result['success'] ?? false) {
                Notification::make()
                    ->title('Reverb WebSocket Started')
                    ->body('Daemon is active and listening on port 8080.')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Failed to Start Reverb')
                    ->body($result['message'] ?? 'Unknown error occurred.')
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        } finally {
            $this->isProcessing = false;
            $this->actionMessage = '';
        }
    }

    public function stopServer(): void
    {
        $this->isProcessing = true;
        $this->actionMessage = 'Stopping Reverb WebSocket daemon...';

        try {
            $result = app(DaemonManagerService::class)->stopReverb();
            $this->checkStatus();

            if ($result['success'] ?? false) {
                Notification::make()
                    ->title('Reverb WebSocket Stopped')
                    ->body('WebSocket daemon process was halted safely.')
                    ->warning()
                    ->send();
            } else {
                Notification::make()
                    ->title('Failed to Stop Reverb')
                    ->body($result['message'] ?? 'Unknown error occurred.')
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        } finally {
            $this->isProcessing = false;
            $this->actionMessage = '';
        }
    }

    public function restartServer(): void
    {
        $this->isProcessing = true;
        $this->actionMessage = 'Restarting Reverb WebSocket daemon...';

        try {
            $result = app(DaemonManagerService::class)->restartReverb();
            $this->checkStatus();

            if ($result['success'] ?? false) {
                Notification::make()
                    ->title('Reverb WebSocket Restarted')
                    ->body('Daemon restarted and accepting connections.')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Failed to Restart Reverb')
                    ->body($result['message'] ?? 'Unknown error occurred.')
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        } finally {
            $this->isProcessing = false;
            $this->actionMessage = '';
        }
    }

    public function render()
    {
        return view('livewire.filament.reverb-top-bar-indicator');
    }
}
