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
                    // Top Split: Company Name & Direct Inline Status Dropdown
                    Split::make([
                        TextColumn::make('company_name')
                            ->searchable()
                            ->weight('bold')
                            ->size('lg')
                            ->icon('heroicon-o-building-office-2'),
                    ]),

                    // Contact Info Line
                    Split::make([
                        TextColumn::make('contact_name')
                            ->searchable()
                            ->icon('heroicon-o-user')
                            ->color('gray'),
                        TextColumn::make('business_type')
                            ->badge()
                            ->color('primary'),
                    ]),

                    // Communication Details
                    Split::make([
                        TextColumn::make('email')
                            ->icon('heroicon-o-envelope')
                            ->color('gray')
                            ->copyable(),
                        TextColumn::make('phone')
                            ->icon('heroicon-o-phone')
                            ->color('gray')
                            ->copyable(),
                    ]),

                    // Volume & Series
                    Split::make([
                        TextColumn::make('target_volume')
                            ->badge()
                            ->color('warning')
                            ->icon('heroicon-o-archive-box'),
                        TextColumn::make('product_series')
                            ->badge()
                            ->color('info'),
                    ]),

                    // Inline Controls: Status Select & Sample Toggle
                    Split::make([
                        SelectColumn::make('status')
                            ->options([
                                'new' => 'New Inquiry',
                                'contacted' => 'Contacted',
                                'in_review' => 'In Review',
                                'sample_sent' => 'Sample Dispatched',
                                'quoted' => 'Quoted',
                                'approved' => 'Approved (B2B)',
                                'closed' => 'Closed',
                            ])
                            ->selectablePlaceholder(false),
                        ToggleColumn::make('sample_requested')
                            ->label('Sample Needed'),
                    ]),

                    // Optional Notes Panel
                    Panel::make([
                        TextColumn::make('notes')
                            ->label('Notes')
                            ->limit(100)
                            ->placeholder('No notes provided.')
                            ->color('gray'),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y · h:i A')
                            ->color('gray')
                            ->size('xs'),
                    ])->collapsible(),
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
