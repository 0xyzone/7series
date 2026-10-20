<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\SystemServices;
use App\Services\DaemonManagerService;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class WebSocketStatusWidget extends Widget
{
    protected string $view = 'filament.widgets.websocket-status-widget';

    protected static ?int $sort = -10;

    protected int|string|array $columnSpan = 'full';

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
                    ->title('Laravel Reverb Started')
                    ->body($result['message'])
                    ->success()
                    ->send();
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

    public function startWhatsApp(): void
    {
        try {
            $result = app(DaemonManagerService::class)->startWhatsApp();

            if ($result['success']) {
                Notification::make()
                    ->title('WhatsApp Gateway Started')
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

    public function getManageUrlProperty(): string
    {
        try {
            return SystemServices::getUrl();
        } catch (\Throwable $e) {
            return '/mukhiya/system-services';
        }
    }
}
