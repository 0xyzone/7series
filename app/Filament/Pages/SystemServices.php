<?php

namespace App\Filament\Pages;

use App\Services\DaemonManagerService;
use App\Services\ServerWhatsAppService;
use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class SystemServices extends Page
{
    protected static ?string $navigationLabel = 'WebSockets & WhatsApp';

    protected static \UnitEnum|string|null $navigationGroup = 'Access Control';

    protected static ?int $navigationSort = 10;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSignal;

    protected string $view = 'filament.pages.system-services';

    public ?string $testPhone = '';
    public ?string $testMessage = 'Hello from 7Series Denim Automated Server System!';

    /**
     * Restrict page access strictly to super_admin.
     */
    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && ($user->hasRole('super_admin') || $user->email === 'samparka@7series.com.np');
    }

    public function getDaemonManager(): DaemonManagerService
    {
        return app(DaemonManagerService::class);
    }

    public function getReverbDetailsProperty(): array
    {
        return $this->getDaemonManager()->getReverbDetails();
    }

    public function getWhatsAppStatusProperty(): array
    {
        return $this->getDaemonManager()->getWhatsAppStatus();
    }

    public function getWhatsAppLogsProperty(): string
    {
        return $this->getDaemonManager()->getWhatsAppLogs();
    }

    public function startReverb(): void
    {
        try {
            $result = $this->getDaemonManager()->startReverb();

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

    public function stopReverb(): void
    {
        try {
            $result = $this->getDaemonManager()->stopReverb();

            if ($result['success']) {
                Notification::make()
                    ->title('Laravel Reverb Stopped')
                    ->body($result['message'])
                    ->warning()
                    ->send();
            } else {
                Notification::make()
                    ->title('Action Failed')
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
            $result = $this->getDaemonManager()->startWhatsApp();

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

    public function stopWhatsApp(): void
    {
        try {
            $result = $this->getDaemonManager()->stopWhatsApp();

            if ($result['success']) {
                Notification::make()
                    ->title('WhatsApp Gateway Stopped')
                    ->body($result['message'])
                    ->warning()
                    ->send();
            } else {
                Notification::make()
                    ->title('Action Failed')
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

    public function sendTestWhatsApp(): void
    {
        if (empty($this->testPhone)) {
            Notification::make()
                ->title('Phone Number Required')
                ->body('Please enter a recipient phone number (e.g., 9800000000).')
                ->danger()
                ->send();
            return;
        }

        $service = app(ServerWhatsAppService::class);
        $result = $service->send($this->testPhone, $this->testMessage);

        if (!empty($result['dispatched'])) {
            Notification::make()
                ->title('Test WhatsApp Dispatched')
                ->body("Message processed via {$result['provider']} to {$result['phone']}.")
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Dispatch Error')
                ->body($result['reason'] ?? 'Could not send WhatsApp message.')
                ->danger()
                ->send();
        }
    }
}
