<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\SystemServices;
use App\Services\DaemonManagerService;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class ThreeJsDaemonWidget extends Widget
{
    protected string $view = 'filament.widgets.threejs-daemon-widget';

    protected static ?int $sort = -20;

    protected int|string|array $columnSpan = 'full';

    public ?string $testPhone = '';

    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && ($user->hasRole('super_admin') || $user->email === 'samparka@7series.com.np');
    }

    public function getReverbRunningProperty(): bool
    {
        return app(DaemonManagerService::class)->isReverbRunning();
    }

    public function getWhatsAppStatusProperty(): array
    {
        return app(DaemonManagerService::class)->getWhatsAppStatus();
    }

    public function startReverb(): void
    {
        try {
            $result = app(DaemonManagerService::class)->startReverb();

            if ($result['success']) {
                Notification::make()
                    ->title('Laravel Reverb WebSocket Online')
                    ->body('WebSocket daemon is active and listening on port 8080.')
                    ->success()
                    ->send();
                $this->dispatch('daemon-state-changed', state: 'active');
            } else {
                Notification::make()
                    ->title('Reverb Startup Failed')
                    ->body($result['message'])
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Unexpected Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function stopReverb(): void
    {
        try {
            $result = app(DaemonManagerService::class)->stopReverb();

            if ($result['success']) {
                Notification::make()
                    ->title('Laravel Reverb Offline')
                    ->body('WebSocket server daemon was safely stopped.')
                    ->warning()
                    ->send();
                $this->dispatch('daemon-state-changed', state: 'inactive');
            } else {
                Notification::make()
                    ->title('Failed to Stop Reverb')
                    ->body($result['message'])
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Unexpected Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function startWhatsApp(): void
    {
        try {
            $result = app(DaemonManagerService::class)->startWhatsApp();

            if ($result['success']) {
                Notification::make()
                    ->title('WhatsApp Gateway Online')
                    ->body($result['message'])
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('WhatsApp Gateway Error')
                    ->body($result['message'])
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Unexpected Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function stopWhatsApp(): void
    {
        try {
            $result = app(DaemonManagerService::class)->stopWhatsApp();

            if ($result['success']) {
                Notification::make()
                    ->title('WhatsApp Gateway Stopped')
                    ->body($result['message'])
                    ->warning()
                    ->send();
            } else {
                Notification::make()
                    ->title('Failed to Stop Gateway')
                    ->body($result['message'])
                    ->danger()
                    ->send();
            }
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Unexpected Error')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function getManageUrlProperty(): string
    {
        try {
            return SystemServices::getUrl();
        } catch (\Throwable $e) {
            return '/mukhiya/system-services';
        }
    }
}
