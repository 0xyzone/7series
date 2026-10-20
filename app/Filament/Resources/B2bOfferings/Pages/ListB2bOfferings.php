<?php

namespace App\Filament\Resources\B2bOfferings\Pages;

use App\Filament\Resources\B2bOfferings\B2bOfferingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListB2bOfferings extends ListRecords
{
    protected static string $resource = B2bOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->slideOver(),
        ];
    }
}
