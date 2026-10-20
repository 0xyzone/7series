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
            ->columns([
                Stack::make([
                    // Header: Company Name
                    TextColumn::make('company_name')
                        ->searchable()
                        ->weight('bold')
                        ->size('base')
                        ->icon('heroicon-o-building-office-2')
                        ->wrap(),

                    // Contact Info Line
                    Split::make([
                        TextColumn::make('contact_name')
                            ->searchable()
                            ->icon('heroicon-o-user')
                            ->color('gray')
                            ->size('xs')
                            ->wrap(),
                        TextColumn::make('business_type')
                            ->badge()
                            ->color('primary')
                            ->grow(false),
                    ]),

                    // Communication Details
                    Split::make([
                        TextColumn::make('email')
                            ->icon('heroicon-o-envelope')
                            ->color('gray')
                            ->size('xs')
                            ->wrap(),
                        TextColumn::make('phone')
                            ->icon('heroicon-o-phone')
                            ->color('gray')
                            ->size('xs')
                            ->wrap(),
                    ]),

                    // Volume & Series
                    Split::make([
                        TextColumn::make('target_volume')
                            ->badge()
                            ->color('warning')
                            ->icon('heroicon-o-archive-box')
                            ->grow(false),
                        TextColumn::make('product_series')
                            ->badge()
                            ->color('info')
                            ->grow(false),
                    ]),

                    // Status Dropdown Full Width
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

                    // Sample Toggle & Date
                    Split::make([
                        ToggleColumn::make('sample_requested')
                            ->label('Sample Needed')
                            ->grow(false),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y · h:i A')
                            ->color('gray')
                            ->size('xs')
                            ->grow(false),
                    ]),

                    // Notes
                    TextColumn::make('notes')
                        ->label('Notes')
                        ->limit(120)
                        ->wrap()
                        ->placeholder('No additional notes.')
                        ->color('gray')
                        ->size('xs'),
                ])->space(2),
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
