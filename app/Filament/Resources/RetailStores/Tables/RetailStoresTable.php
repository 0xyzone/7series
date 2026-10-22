<?php

namespace App\Filament\Resources\RetailStores\Tables;

use App\Models\RetailStore;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
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
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Stack::make([
                    // 1. Mobile App Cover Photo
                    ImageColumn::make('image')
                        ->getStateUsing(function (RetailStore $record) {
                            if (!empty($record->image_url)) {
                                return $record->image_url;
                            }
                            if (empty($record->image)) {
                                return asset('images/facility.jpg');
                            }
                            if (str_starts_with($record->image, 'http') || str_starts_with($record->image, 'images/')) {
                                return asset($record->image);
                            }
                            return asset('storage/' . $record->image);
                        })
                        ->height('160px')
                        ->width('100%')
                        ->extraImgAttributes([
                            'class' => 'object-cover rounded-xl w-full shadow-sm mb-1',
                        ]),

                    // 2. Category, City & Order Chips
                    Split::make([
                        TextColumn::make('store_type')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'flagship' => '🌟 Flagship Store',
                                'official_store' => '🏬 Official Outlet',
                                'authorized_retailer' => '🤝 Partner Stockist',
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
                            ->grow(false),

                        TextColumn::make('city')
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-m-map-pin')
                            ->searchable()
                            ->grow(false),

                        TextColumn::make('sort_order')
                            ->badge()
                            ->color('gray')
                            ->prefix('Priority #')
                            ->alignEnd()
                            ->grow(false),
                    ]),

                    // 3. Store Name & Landmark
                    TextColumn::make('name')
                        ->searchable()
                        ->weight('bold')
                        ->size('lg')
                        ->icon('heroicon-m-building-storefront')
                        ->wrap(),

                    TextColumn::make('landmark')
                        ->size('xs')
                        ->color('gray')
                        ->icon('heroicon-m-map')
                        ->formatStateUsing(fn ($state) => filled($state) ? 'Near: ' . $state : null)
                        ->placeholder('Central commercial zone')
                        ->wrap(),

                    // 4. Address & Timings
                    TextColumn::make('address')
                        ->icon('heroicon-m-map-pin')
                        ->color('gray')
                        ->size('xs')
                        ->wrap(),

                    Split::make([
                        TextColumn::make('phone')
                            ->icon('heroicon-m-phone')
                            ->color('gray')
                            ->size('xs')
                            ->placeholder('No phone listed')
                            ->wrap(),

                        TextColumn::make('operating_hours')
                            ->icon('heroicon-m-clock')
                            ->color('gray')
                            ->size('xs')
                            ->placeholder('10:00 AM – 8:00 PM')
                            ->grow(false),
                    ]),

                    // 5. Mobile App Settings Control Panel with Clear Dynamic Labels
                    Panel::make([
                        Stack::make([
                            // Active Switch Row
                            Split::make([
                                TextColumn::make('active_label')
                                    ->getStateUsing(fn (RetailStore $record) => $record->is_active ? 'Live on Store Locator' : 'Hidden from Website')
                                    ->description(fn (RetailStore $record) => $record->is_active ? 'Publicly visible to shoppers' : 'Draft / offline mode')
                                    ->icon('heroicon-m-globe-alt')
                                    ->iconColor(fn (RetailStore $record) => $record->is_active ? 'success' : 'gray')
                                    ->size('xs')
                                    ->weight('bold'),

                                ToggleColumn::make('is_active')
                                    ->grow(false),
                            ]),

                            // Featured Switch Row
                            Split::make([
                                TextColumn::make('featured_label')
                                    ->getStateUsing(fn (RetailStore $record) => $record->featured ? 'Featured Spotlight' : 'Standard Directory')
                                    ->description(fn (RetailStore $record) => $record->featured ? 'Pinned at top of locator' : 'Standard alphabetical order')
                                    ->icon('heroicon-m-star')
                                    ->iconColor(fn (RetailStore $record) => $record->featured ? 'warning' : 'gray')
                                    ->size('xs')
                                    ->weight('bold'),

                                ToggleColumn::make('featured')
                                    ->grow(false),
                            ]),
                        ])->space(3),
                    ]),
                ])->space(3),
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
                        'flagship' => '🌟 Flagship Store',
                        'official_store' => '🏬 Official Outlet',
                        'authorized_retailer' => '🤝 Partner Stockist',
                        'wholesale_hub' => '📦 Wholesale Hub',
                        'factory_outlet' => '🏭 Factory Outlet',
                    ]),

                TernaryFilter::make('is_active')
                    ->label('Visibility')
                    ->trueLabel('Live / Published Stores')
                    ->falseLabel('Hidden Stores')
                    ->placeholder('All Stores'),

                TernaryFilter::make('featured')
                    ->label('Spotlight')
                    ->trueLabel('Featured Only')
                    ->falseLabel('Standard Only')
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
