<?php

namespace App\Filament\Resources\WholesaleInquiries\Pages;

use App\Filament\Resources\WholesaleInquiries\WholesaleInquiryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWholesaleInquiries extends ListRecords
{
    protected static string $resource = WholesaleInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->slideOver(),
        ];
    }
}
