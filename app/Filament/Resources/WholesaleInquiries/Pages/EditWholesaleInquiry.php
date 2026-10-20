<?php

namespace App\Filament\Resources\WholesaleInquiries\Pages;

use App\Filament\Resources\WholesaleInquiries\WholesaleInquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWholesaleInquiry extends EditRecord
{
    protected static string $resource = WholesaleInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
