<?php

namespace App\Filament\Resources\B2bOfferings;

use App\Filament\Resources\B2bOfferings\Pages\CreateB2bOffering;
use App\Filament\Resources\B2bOfferings\Pages\EditB2bOffering;
use App\Filament\Resources\B2bOfferings\Pages\ListB2bOfferings;
use App\Models\B2bOffering;
use BackedEnum;
use UnitEnum;
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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static UnitEnum|string|null $navigationGroup = 'B2B Operations';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'B2B Offerings';

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
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->recordTitleAttribute('title')
            ->columns([
                \Filament\Tables\Columns\Layout\Stack::make([
                    \Filament\Tables\Columns\ImageColumn::make('image')
                        ->getStateUsing(function ($record) {
                            if (empty($record->image)) {
                                return asset('images/collection-1.png');
                            }
                            if (str_starts_with($record->image, 'http') || str_starts_with($record->image, 'images/')) {
                                return asset($record->image);
                            }
                            return asset('storage/' . $record->image);
                        })
                        ->height('140px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-lg w-full mb-2']),

                    \Filament\Tables\Columns\Layout\Split::make([
                        TextColumn::make('title')
                            ->searchable()
                            ->weight('bold')
                            ->size('base')
                            ->wrap(),
                        TextColumn::make('category')
                            ->badge()
                            ->color('info')
                            ->grow(false),
                    ]),

                    TextColumn::make('fabric_spec')
                        ->color('gray')
                        ->size('xs')
                        ->icon('heroicon-o-sparkles')
                        ->wrap(),

                    \Filament\Tables\Columns\Layout\Split::make([
                        TextColumn::make('moq')
                            ->label('MOQ')
                            ->icon('heroicon-o-cube')
                            ->color('gray')
                            ->size('xs'),
                        TextColumn::make('turnaround_time')
                            ->icon('heroicon-o-clock')
                            ->color('gray')
                            ->size('xs'),
                    ]),

                    \Filament\Tables\Columns\Layout\Split::make([
                        TextColumn::make('fob_price_range')
                            ->weight('bold')
                            ->color('primary')
                            ->size('sm')
                            ->wrap(),
                        \Filament\Tables\Columns\ToggleColumn::make('is_active')
                            ->label('Active')
                            ->grow(false),
                    ]),

                    TextColumn::make('description')
                        ->limit(100)
                        ->wrap()
                        ->color('gray')
                        ->size('xs')
                        ->placeholder('No description provided.'),
                ])->space(2),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                \Filament\Actions\ViewAction::make()->modalWidth('7xl'),
                EditAction::make()->modalWidth('7xl'),
                \Filament\Actions\DeleteAction::make(),
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
        ];
    }
}
