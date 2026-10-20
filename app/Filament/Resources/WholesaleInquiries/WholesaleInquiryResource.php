<?php

namespace App\Filament\Resources\WholesaleInquiries;

use App\Filament\Resources\WholesaleInquiries\Pages\CreateWholesaleInquiry;
use App\Filament\Resources\WholesaleInquiries\Pages\EditWholesaleInquiry;
use App\Filament\Resources\WholesaleInquiries\Pages\ListWholesaleInquiries;
use App\Filament\Resources\WholesaleInquiries\Schemas\WholesaleInquiryForm;
use App\Filament\Resources\WholesaleInquiries\Tables\WholesaleInquiriesTable;
use Agroezinger\FilamentShieldEnhanced\Traits\HasResourceShield;
use App\Models\WholesaleInquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WholesaleInquiryResource extends Resource
{
    use HasResourceShield;

    protected static ?string $model = WholesaleInquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'company_name';

    public static function getShieldResourcePermissions(): array
    {
        return [
            'export' => 'Can export wholesale inquiries',
            'changeStatus' => 'Can update inquiry status',
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return WholesaleInquiryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WholesaleInquiriesTable::configure($table);
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
            'index' => ListWholesaleInquiries::route('/'),
            'create' => CreateWholesaleInquiry::route('/create'),
            'edit' => EditWholesaleInquiry::route('/{record}/edit'),
        ];
    }
}
