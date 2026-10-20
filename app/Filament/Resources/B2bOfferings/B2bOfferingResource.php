<?php

namespace App\Filament\Resources\B2bOfferings;

use App\Filament\Resources\B2bOfferings\Pages\CreateB2bOffering;
use App\Filament\Resources\B2bOfferings\Pages\EditB2bOffering;
use App\Filament\Resources\B2bOfferings\Pages\ListB2bOfferings;
use App\Models\B2bOffering;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class B2bOfferingResource extends Resource
{
    protected static ?string $model = B2bOffering::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('category')
                    ->default('Denim')
                    ->required(),
                TextInput::make('fabric_spec')
                    ->label('Fabric Specification')
                    ->placeholder('e.g. 14.5oz Japanese Kurabo Selvedge'),
                TextInput::make('moq')
                    ->label('Minimum Order Quantity')
                    ->default('250 units'),
                TextInput::make('fob_price_range')
                    ->label('Wholesale FOB Price Range')
                    ->placeholder('e.g. $22.50 – $26.00 FOB'),
                TextInput::make('turnaround_time')
                    ->default('14-21 days'),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->directory('b2b-offerings')
                    ->disk('public')
                    ->image(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->badge()
                    ->sortable(),
                TextColumn::make('moq')
                    ->label('MOQ'),
                TextColumn::make('fob_price_range')
                    ->label('FOB Range'),
                \Filament\Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => ListB2bOfferings::route('/'),
            'create' => CreateB2bOffering::route('/create'),
            'edit' => EditB2bOffering::route('/{record}/edit'),
        ];
    }
}
