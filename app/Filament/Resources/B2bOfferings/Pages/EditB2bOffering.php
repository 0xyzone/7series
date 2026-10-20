<?php

namespace App\Filament\Resources\B2bOfferings\Pages;

use App\Filament\Resources\B2bOfferings\B2bOfferingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditB2bOffering extends EditRecord
{
    protected static string $resource = B2bOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
