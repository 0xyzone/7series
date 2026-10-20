<?php

namespace App\Filament\Resources\RetailStores;

use App\Filament\Resources\RetailStores\Pages\CreateRetailStore;
use App\Filament\Resources\RetailStores\Pages\EditRetailStore;
use App\Filament\Resources\RetailStores\Pages\ListRetailStores;
use App\Filament\Resources\RetailStores\Schemas\RetailStoreForm;
use App\Filament\Resources\RetailStores\Tables\RetailStoresTable;
use App\Models\RetailStore;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RetailStoreResource extends Resource
{
    protected static ?string $model = RetailStore::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static \UnitEnum|string|null $navigationGroup = 'B2B Operations';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Official Stores & Stockists';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return RetailStoreForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RetailStoresTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRetailStores::route('/'),
        ];
    }
}
