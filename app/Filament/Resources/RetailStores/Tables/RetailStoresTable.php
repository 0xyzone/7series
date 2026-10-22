<?php

namespace App\Filament\Resources\RetailStores\Tables;

use App\Models\RetailStore;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class RetailStoresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                ImageColumn::make('image')
                    ->label('Photo')
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        if (empty($record->image)) {
                            return asset('images/facility.jpg');
                        }
                        if (str_starts_with($record->image, 'http') || str_starts_with($record->image, 'images/')) {
                            return asset($record->image);
                        }
                        return asset('storage/' . $record->image);
                    })
                    ->square()
                    ->size(54)
                    ->extraImgAttributes(['class' => 'rounded-xl shadow-xs object-cover border border-zinc-200']),

                TextColumn::make('name')
                    ->label('Store / Outlet')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn (RetailStore $record) => $record->landmark ? '📍 Landmark: ' . $record->landmark : $record->slug)
                    ->wrap(),

                TextColumn::make('store_type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'flagship' => '🌟 Flagship Store',
                        'official_store' => '🏬 Official Outlet',
                        'authorized_retailer' => '🤝 Stockist / Partner',
                        'wholesale_hub' => '📦 Wholesale Hub',
                        'factory_outlet' => '🏭 Factory Outlet',
                        default => ucfirst(str_replace('_', ' ', $state)),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'flagship' => 'danger',
                        'official_store' => 'primary',
                        'authorized_retailer' => 'warning',
                        'wholesale_hub' => 'info',
                        'factory_outlet' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('city')
                    ->label('City & Address')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-m-map-pin')
                    ->description(fn (RetailStore $record) => $record->address)
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('phone')
                    ->label('Contact & Timing')
                    ->icon('heroicon-m-phone')
                    ->description(fn (RetailStore $record) => $record->operating_hours ?: '10:00 AM – 8:00 PM')
                    ->searchable(),

                ToggleColumn::make('is_active')
                    ->label('Active Status')
                    ->tooltip('Toggle store visibility on customer-facing website')
                    ->sortable(),

                ToggleColumn::make('featured')
                    ->label('Featured')
                    ->tooltip('Toggle featured spotlight at top of store locator')
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Priority')
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('gray'),
            ])
            ->filters([
                SelectFilter::make('city')
                    ->label('Filter by City')
                    ->options([
                        'Kathmandu' => 'Kathmandu',
                        'Lalitpur' => 'Lalitpur',
                        'Bhaktapur' => 'Bhaktapur',
                        'Pokhara' => 'Pokhara',
                        'Butwal' => 'Butwal',
                        'Biratnagar' => 'Biratnagar',
                        'Dharan' => 'Dharan',
                        'Narayangarh' => 'Narayangarh',
                        'Nepalgunj' => 'Nepalgunj',
                        'Itahari' => 'Itahari',
                        'Hetauda' => 'Hetauda',
                        'Birgunj' => 'Birgunj',
                        'Birtamode' => 'Birtamode',
                    ]),

                SelectFilter::make('store_type')
                    ->label('Filter by Type')
                    ->options([
                        'flagship' => 'Flagship Store',
                        'official_store' => 'Official Brand Outlet',
                        'authorized_retailer' => 'Authorized Stockist',
                        'wholesale_hub' => 'Wholesale & Depot',
                        'factory_outlet' => 'Factory Outlet',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Active Visibility')
                    ->trueLabel('Active / Published Only')
                    ->falseLabel('Hidden / Inactive Only')
                    ->placeholder('All Stores'),

                TernaryFilter::make('featured')
                    ->label('Featured Status')
                    ->trueLabel('Featured Stores Only')
                    ->falseLabel('Standard Stores Only')
                    ->placeholder('All Stores'),
            ])
            ->recordActions([
                ViewAction::make()->slideOver()->modalWidth('3xl'),
                EditAction::make()->slideOver()->modalWidth('3xl'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
