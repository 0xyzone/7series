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
use Filament\Tables\Filters\ToggledFilter;
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
            ->columns([
                Stack::make([
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
                        ->height('150px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-lg w-full mb-2']),

                    Split::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->weight('bold')
                            ->size('base')
                            ->wrap(),
                        TextColumn::make('price')
                            ->money('USD')
                            ->weight('bold')
                            ->color('primary')
                            ->grow(false),
                    ]),

                    Split::make([
                        TextColumn::make('category.name')
                            ->badge()
                            ->color('info')
                            ->searchable()
                            ->grow(false),
                        ToggleColumn::make('is_active')
                            ->label('Active')
                            ->grow(false),
                    ]),

                    Split::make([
                        TextColumn::make('slug')
                            ->color('gray')
                            ->size('xs')
                            ->icon('heroicon-o-link')
                            ->limit(30),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y')
                            ->color('gray')
                            ->size('xs')
                            ->grow(false),
                    ]),
                ])->space(2),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
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
