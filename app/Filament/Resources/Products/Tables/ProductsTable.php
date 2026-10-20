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
                        ->disk('public')
                        ->height('180px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-lg w-full mb-2']),

                    Split::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->weight('bold')
                            ->size('lg'),
                        TextColumn::make('price')
                            ->money('USD')
                            ->weight('bold')
                            ->color('primary'),
                    ]),

                    Split::make([
                        TextColumn::make('category.name')
                            ->badge()
                            ->color('info')
                            ->searchable(),
                        ToggleColumn::make('is_active')
                            ->label('Active'),
                    ]),

                    Panel::make([
                        TextColumn::make('slug')
                            ->color('gray')
                            ->size('xs')
                            ->icon('heroicon-o-link'),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y')
                            ->color('gray')
                            ->size('xs'),
                    ])->collapsible(),
                ])->space(3),
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
