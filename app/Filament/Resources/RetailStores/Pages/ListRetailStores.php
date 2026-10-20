<?php

namespace App\Filament\Resources\RetailStores\Pages;

use App\Filament\Resources\RetailStores\RetailStoreResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRetailStores extends ListRecords
{
    protected static string $resource = RetailStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->slideOver(),
        ];
    }
}
