<?php

namespace App\Filament\Resources\WholesaleInquiries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WholesaleInquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company & Contact')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('company_name')
                                    ->label('Company / Brand')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('contact_name')
                                    ->label('Contact Person')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->label('Email Address')
                                    ->email()
                                    ->required(),
                                TextInput::make('phone')
                                    ->label('Phone / WhatsApp')
                                    ->tel(),
                            ]),
                    ]),

                Section::make('Production Requirements')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('business_type')
                                    ->label('Business Model')
                                    ->options([
                                        'Wholesaler' => 'Wholesaler / Distributor',
                                        'Retailer' => 'Retail Store / Chain',
                                        'Fashion Brand' => 'Fashion / Apparel Brand',
                                        'Corporate OEM' => 'Corporate / Custom OEM',
                                        'Other' => 'Other',
                                    ]),
                                Select::make('target_volume')
                                    ->label('Target Volume')
                                    ->options([
                                        '250-499 pcs' => '250 – 499 units (Pilot)',
                                        '500-999 pcs' => '500 – 999 units (Standard)',
                                        '1000-4999 pcs' => '1,000 – 4,999 units (Scale)',
                                        '5000+ pcs' => '5,000+ units (Enterprise)',
                                    ]),
                                TextInput::make('product_series')
                                    ->label('Product Category / Series')
                                    ->placeholder('e.g. Raw Selvedge Denim, Washed Denim, Jackets'),
                                Select::make('status')
                                    ->label('Inquiry Status')
                                    ->options([
                                        'new' => 'New Inquiry',
                                        'contacted' => 'Contacted',
                                        'in_review' => 'In Review',
                                        'sample_sent' => 'Sample Dispatched',
                                        'quoted' => 'Quotation Sent',
                                        'approved' => 'Approved (B2B Client)',
                                        'closed' => 'Closed / Archive',
                                    ])
                                    ->default('new')
                                    ->required(),
                            ]),
                        Toggle::make('sample_requested')
                            ->label('Fabric / Fitting Sample Requested')
                            ->default(false),
                        Textarea::make('notes')
                            ->label('Client Notes & Requirements')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
