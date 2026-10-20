<?php

namespace App\Filament\Resources\RetailStores\Tables;

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
                        ->height('160px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-lg w-full mb-2'])
                        ->defaultImageUrl(asset('images/brand/logo-dark.png')),

                    Split::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->weight('bold')
                            ->size('lg')
                            ->icon('heroicon-o-building-storefront'),
                        TextColumn::make('city')
                            ->badge()
                            ->color('info')
                            ->searchable(),
                    ]),

                    Split::make([
                        TextColumn::make('store_type')
                            ->badge()
                            ->color('primary'),
                        TextColumn::make('phone')
                            ->icon('heroicon-o-phone')
                            ->color('gray')
                            ->size('xs'),
                    ]),

                    Split::make([
                        ToggleColumn::make('is_active')
                            ->label('Active'),
                        ToggleColumn::make('featured')
                            ->label('Featured'),
                    ]),

                    Panel::make([
                        TextColumn::make('address')
                            ->icon('heroicon-o-map-pin')
                            ->color('gray')
                            ->size('xs'),
                        TextColumn::make('operating_hours')
                            ->icon('heroicon-o-clock')
                            ->color('gray')
                            ->size('xs'),
                    ])->collapsible(),
                ])->space(3),
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
