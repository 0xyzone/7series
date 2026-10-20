<?php

namespace App\Filament\Resources\RetailStores\Pages;

use App\Filament\Resources\RetailStores\RetailStoreResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRetailStore extends EditRecord
{
    protected static string $resource = RetailStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
