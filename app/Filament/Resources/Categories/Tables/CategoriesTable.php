<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
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
                    Split::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->weight('bold')
                            ->size('lg')
                            ->icon('heroicon-o-tag'),
                        TextColumn::make('products_count')
                            ->counts('products')
                            ->badge()
                            ->color('info')
                            ->suffix(' items'),
                    ]),
                    Split::make([
                        TextColumn::make('slug')
                            ->color('gray')
                            ->size('xs')
                            ->icon('heroicon-o-link'),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y')
                            ->color('gray')
                            ->size('xs'),
                    ]),
                ])->space(3),
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
