<?php

namespace App\Filament\Widgets;

use App\Models\B2bOffering;
use App\Models\Product;
use App\Models\RetailStore;
use App\Models\WholesaleInquiry;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WholesaleStatsWidget extends BaseWidget
{
    protected static ?int $sort = -15;

    protected function getStats(): array
    {
        $newCount = WholesaleInquiry::where('status', 'new')->count();
        $totalInquiries = WholesaleInquiry::count();
        $samplesCount = WholesaleInquiry::where('sample_requested', true)->count();
        $activeProducts = Product::where('is_active', true)->count();
        $b2bOfferings = B2bOffering::where('is_active', true)->count();
        $storesCount = RetailStore::where('is_active', true)->count();

        return [
            Stat::make('Wholesale Inquiries', $totalInquiries)
                ->description($newCount > 0 ? "{$newCount} new pending inquiries" : 'All inquiries up to date')
                ->descriptionIcon($newCount > 0 ? 'heroicon-m-inbox-arrow-down' : 'heroicon-m-check-badge')
                ->color($newCount > 0 ? 'danger' : 'success')
                ->chart([7, 12, 10, 14, 18, 16, $totalInquiries ?: 1]),

            Stat::make('Samples Requested', $samplesCount)
                ->description('Fitting & raw selvedge swatches')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('warning')
                ->chart([2, 4, 3, 6, 5, 8, $samplesCount ?: 1]),

            Stat::make('Active B2B Lines', $b2bOfferings)
                ->description("{$activeProducts} active retail catalog items")
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('info')
                ->chart([3, 3, 3, 4, 4, $b2bOfferings ?: 1]),

            Stat::make('Retail & Depot Network', $storesCount)
                ->description('Stores active across Nepal')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('primary')
                ->chart([2, 3, 4, 4, 5, $storesCount ?: 1]),
        ];
    }
}
