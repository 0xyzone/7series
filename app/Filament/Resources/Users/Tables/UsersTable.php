<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
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
                            ->size('base')
                            ->icon('heroicon-o-user-circle')
                            ->wrap(),
                        TextColumn::make('roles.name')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'super_admin' => 'danger',
                                'panel_user' => 'info',
                                default => 'primary',
                            })
                            ->grow(false),
                    ]),

                    Split::make([
                        TextColumn::make('email')
                            ->icon('heroicon-o-envelope')
                            ->color('gray')
                            ->wrap()
                            ->copyable(),
                    ]),

                    Split::make([
                        TextColumn::make('email_verified_at')
                            ->label('Verified')
                            ->formatStateUsing(fn ($state) => $state ? 'Verified' : 'Unverified')
                            ->badge()
                            ->color(fn ($record) => $record->email_verified_at ? 'success' : 'warning'),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y')
                            ->color('gray')
                            ->size('xs'),
                    ]),
                ])->space(3),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->relationship('roles', 'name'),
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
