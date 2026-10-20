<?php

namespace App\Filament\Resources\RetailStores\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
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
            ->columns([
                Stack::make([
                    ImageColumn::make('image')
                        ->disk('public')
                        ->height('140px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-lg w-full mb-2'])
                        ->defaultImageUrl('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="300" height="140" viewBox="0 0 300 140"><rect width="300" height="140" fill="%2318181b"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%2371717a" font-family="sans-serif" font-size="14" font-weight="bold">STORE OUTLET</text></svg>'),

                    Split::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->weight('bold')
                            ->size('base')
                            ->icon('heroicon-o-building-storefront')
                            ->wrap(),
                        TextColumn::make('city')
                            ->badge()
                            ->color('info')
                            ->searchable()
                            ->grow(false),
                    ]),

                    Split::make([
                        TextColumn::make('store_type')
                            ->badge()
                            ->color('primary')
                            ->grow(false),
                        TextColumn::make('phone')
                            ->icon('heroicon-o-phone')
                            ->color('gray')
                            ->size('xs')
                            ->wrap(),
                    ]),

                    TextColumn::make('address')
                        ->icon('heroicon-o-map-pin')
                        ->color('gray')
                        ->size('xs')
                        ->wrap(),

                    TextColumn::make('operating_hours')
                        ->icon('heroicon-o-clock')
                        ->color('gray')
                        ->size('xs')
                        ->wrap(),

                    Split::make([
                        ToggleColumn::make('is_active')
                            ->label('Active')
                            ->grow(false),
                        ToggleColumn::make('featured')
                            ->label('Featured')
                            ->grow(false),
                    ]),
                ])->space(2),
            ])
            ->filters([
                SelectFilter::make('city')
                    ->options([
                        'Kathmandu' => 'Kathmandu',
                        'Lalitpur' => 'Lalitpur',
                        'Pokhara' => 'Pokhara',
                        'Biratnagar' => 'Biratnagar',
                        'Butwal' => 'Butwal',
                        'Narayangarh' => 'Narayangarh',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()->slideOver(),
                EditAction::make()->slideOver(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
