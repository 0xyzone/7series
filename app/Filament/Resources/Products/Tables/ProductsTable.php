<?php

namespace App\Filament\Resources\Products\Tables;

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

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->defaultSort('created_at', 'desc')
            ->columns([
                Stack::make([
                    // 1. Cover Photo
                    ImageColumn::make('image')
                        ->getStateUsing(function ($record) {
                            if (empty($record->image)) {
                                return asset('images/jeans-product.jpg');
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

                    // 2. Category & Price Header
                    Split::make([
                        TextColumn::make('category.name')
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-m-tag')
                            ->searchable()
                            ->grow(false),

                        TextColumn::make('price')
                            ->money('USD')
                            ->weight('black')
                            ->badge()
                            ->color('danger')
                            ->alignEnd()
                            ->grow(false),
                    ]),

                    // 3. Product Title
                    TextColumn::make('name')
                        ->searchable()
                        ->weight('bold')
                        ->size('lg')
                        ->wrap(),

                    // 4. SKU / Slug & Added Date
                    Split::make([
                        TextColumn::make('slug')
                            ->color('gray')
                            ->size('xs')
                            ->icon('heroicon-m-link')
                            ->limit(24),

                        TextColumn::make('created_at')
                            ->dateTime('M d, Y')
                            ->color('gray')
                            ->size('xs')
                            ->alignEnd()
                            ->grow(false),
                    ]),

                    // 5. Inset Control Panel with Labeled Live Toggle
                    Panel::make([
                        Split::make([
                            TextColumn::make('status_label')
                                ->getStateUsing(fn ($record) => $record->is_active ? 'Catalog Active' : 'Hidden / Draft')
                                ->description(fn ($record) => $record->is_active ? 'Live in wholesale catalog' : 'Invisible to B2B buyers')
                                ->icon('heroicon-m-check-badge')
                                ->iconColor(fn ($record) => $record->is_active ? 'success' : 'gray')
                                ->size('xs')
                                ->weight('bold'),

                            ToggleColumn::make('is_active')
                                ->grow(false),
                        ]),
                    ]),
                ])->space(3),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                TernaryFilter::make('is_active')
                    ->label('Catalog Status')
                    ->trueLabel('Active Products Only')
                    ->falseLabel('Draft Products Only')
                    ->placeholder('All Products'),
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
