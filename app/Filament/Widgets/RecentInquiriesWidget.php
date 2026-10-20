<?php

namespace App\Filament\Widgets;

use App\Models\WholesaleInquiry;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class RecentInquiriesWidget extends Widget
{
    protected string $view = 'filament.widgets.recent-inquiries-widget';

    protected static ?int $sort = -10;

    protected int|string|array $columnSpan = 'full';

    public function getInquiriesProperty()
    {
        return WholesaleInquiry::latest()->take(4)->get();
    }

    public function updateStatus(int $inquiryId, string $status): void
    {
        $inquiry = WholesaleInquiry::find($inquiryId);
        if ($inquiry) {
            $inquiry->update(['status' => $status]);
            Notification::make()
                ->title('Status Updated')
                ->body("{$inquiry->company_name} marked as " . ucfirst(str_replace('_', ' ', $status)))
                ->success()
                ->send();
        }
    }
}
