<?php

namespace App\Filament\Resources\WholesaleInquiries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class WholesaleInquiriesTable
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
                    // 1. Company Header & Business Type
                    Split::make([
                        TextColumn::make('company_name')
                            ->searchable()
                            ->weight('bold')
                            ->size('lg')
                            ->icon('heroicon-m-building-office-2')
                            ->wrap(),

                        TextColumn::make('business_type')
                            ->badge()
                            ->color('primary')
                            ->grow(false),
                    ]),

                    // 2. Contact Person
                    TextColumn::make('contact_name')
                        ->searchable()
                        ->icon('heroicon-m-user')
                        ->color('gray')
                        ->size('xs'),

                    // 3. Email & Phone (Un-squished full-width rows)
                    TextColumn::make('email')
                        ->icon('heroicon-m-envelope')
                        ->color('gray')
                        ->size('xs')
                        ->copyable(),

                    TextColumn::make('phone')
                        ->icon('heroicon-m-phone')
                        ->color('gray')
                        ->size('xs')
                        ->copyable(),

                    // 4. Volume & Series Badges
                    Split::make([
                        TextColumn::make('target_volume')
                            ->badge()
                            ->color('warning')
                            ->icon('heroicon-m-archive-box')
                            ->grow(false),

                        TextColumn::make('product_series')
                            ->badge()
                            ->color('info')
                            ->grow(false),
                    ]),

                    // 5. Status Dropdown
                    SelectColumn::make('status')
                        ->options([
                            'new' => 'New Inquiry',
                            'contacted' => 'Contacted',
                            'in_review' => 'In Review',
                            'sample_sent' => 'Sample Dispatched',
                            'quoted' => 'Quotation Sent',
                            'approved' => 'Approved (B2B)',
                            'closed' => 'Closed',
                        ])
                        ->selectablePlaceholder(false),

                    // 6. Inset Control Panel with Labeled Sample Toggle & Timestamp
                    Panel::make([
                        Stack::make([
                            Split::make([
                                TextColumn::make('sample_label')
                                    ->getStateUsing(fn ($record) => $record->sample_requested ? 'Fabric Sample Required' : 'Standard Inquiry')
                                    ->description(fn ($record) => $record->sample_requested ? 'Dispatch physical garment swatches' : 'Commercial inquiry only')
                                    ->icon('heroicon-m-swatch')
                                    ->iconColor(fn ($record) => $record->sample_requested ? 'danger' : 'gray')
                                    ->size('xs')
                                    ->weight('bold'),

                                ToggleColumn::make('sample_requested')
                                    ->grow(false),
                            ]),

                            TextColumn::make('created_at')
                                ->dateTime('M d, Y · h:i A')
                                ->color('gray')
                                ->size('xs')
                                ->icon('heroicon-m-calendar'),
                        ])->space(2),
                    ]),

                    // 7. Notes Preview
                    TextColumn::make('notes')
                        ->label('Notes')
                        ->limit(100)
                        ->wrap()
                        ->placeholder('No additional notes.')
                        ->color('gray')
                        ->size('xs'),
                ])->space(3),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New Inquiry',
                        'contacted' => 'Contacted',
                        'in_review' => 'In Review',
                        'sample_sent' => 'Sample Sent',
                        'quoted' => 'Quotation Sent',
                        'approved' => 'Approved',
                        'closed' => 'Closed',
                    ]),
                SelectFilter::make('business_type')
                    ->options([
                        'Wholesaler' => 'Wholesaler',
                        'Retailer' => 'Retailer',
                        'Fashion Brand' => 'Fashion Brand',
                        'Corporate OEM' => 'Corporate OEM',
                    ]),
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
