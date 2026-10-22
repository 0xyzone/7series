<?php

namespace App\Filament\Resources\RetailStores\Schemas;

use App\Models\RetailStore;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RetailStoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Store Identity & Classification')
                    ->description('Specify official store title, URL identifier, classification, and priority.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Store / Outlet Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Seven Series Flagship Store - New Road')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                if ($operation === 'create' && filled($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        TextInput::make('slug')
                            ->label('URL Slug Identifier')
                            ->required()
                            ->unique(RetailStore::class, 'slug', ignoreRecord: true)
                            ->placeholder('e.g. seven-series-flagship-new-road')
                            ->helperText('Unique web identifier used for search filtering and routing.'),

                        Select::make('store_type')
                            ->label('Store Type / Category')
                            ->required()
                            ->default('official_store')
                            ->options([
                                'flagship' => '🌟 Flagship Store (Official Concept)',
                                'official_store' => '🏬 Official Brand Outlet',
                                'authorized_retailer' => '🤝 Authorized Stockist / Partner',
                                'wholesale_hub' => '📦 Wholesale & Regional Distribution Depot',
                                'factory_outlet' => '🏭 Direct Factory Outlet',
                            ])
                            ->native(false),

                        TextInput::make('sort_order')
                            ->label('Display Priority / Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower number appears earlier in public store listings (e.g. 1, 2, 3).'),
                    ])->columns(2),

                Section::make('Location & Geography')
                    ->description('Physical location address, territory, and Google Maps directions link.')
                    ->schema([
                        Select::make('city')
                            ->label('City / Territory')
                            ->required()
                            ->searchable()
                            ->options([
                                'Kathmandu' => 'Kathmandu',
                                'Lalitpur' => 'Lalitpur (Patan)',
                                'Bhaktapur' => 'Bhaktapur',
                                'Pokhara' => 'Pokhara',
                                'Butwal' => 'Butwal',
                                'Biratnagar' => 'Biratnagar',
                                'Dharan' => 'Dharan',
                                'Narayangarh' => 'Narayangarh / Chitwan',
                                'Nepalgunj' => 'Nepalgunj',
                                'Itahari' => 'Itahari',
                                'Hetauda' => 'Hetauda',
                                'Birgunj' => 'Birgunj',
                                'Birtamode' => 'Birtamode',
                                'Dhangadhi' => 'Dhangadhi',
                                'Janakpur' => 'Janakpur',
                                'Bhairahawa' => 'Bhairahawa',
                            ])
                            ->createOptionUsing(fn (string $input) => trim($input))
                            ->native(false),

                        TextInput::make('landmark')
                            ->label('Prominent Landmark')
                            ->placeholder('e.g. Opposite Bishal Bazaar Gate')
                            ->helperText('Notable nearby landmark or junction to help customers easily locate the store.'),

                        TextInput::make('address')
                            ->label('Street Address / Building')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('e.g. Pako Plaza, Ground Floor, New Road'),

                        TextInput::make('google_maps_url')
                            ->label('Google Maps Directions Link')
                            ->columnSpanFull()
                            ->url()
                            ->prefixIcon('heroicon-m-map-pin')
                            ->placeholder('https://maps.app.goo.gl/... or https://maps.google.com/?q=...')
                            ->helperText('Shareable Google Maps link for the customer "Get Directions" button.'),
                    ])->columns(2),

                Section::make('Contact & Business Hours')
                    ->description('Direct phone contact, customer email, and operating hours schedule.')
                    ->schema([
                        TextInput::make('phone')
                            ->label('Contact Telephone / Mobile')
                            ->tel()
                            ->prefixIcon('heroicon-m-phone')
                            ->placeholder('e.g. +977-1-4240007 / 9801234567'),

                        TextInput::make('email')
                            ->label('Official Store Email')
                            ->email()
                            ->prefixIcon('heroicon-m-envelope')
                            ->placeholder('e.g. newroad@7series.com.np'),

                        Select::make('operating_hours')
                            ->label('Operating / Business Hours')
                            ->columnSpanFull()
                            ->searchable()
                            ->default('10:00 AM – 8:00 PM (Daily)')
                            ->options([
                                '10:00 AM – 8:00 PM (Daily)' => '10:00 AM – 8:00 PM (Daily)',
                                '10:00 AM – 8:00 PM (Everyday)' => '10:00 AM – 8:00 PM (Everyday)',
                                '10:30 AM – 8:30 PM (Sun–Fri)' => '10:30 AM – 8:30 PM (Sun–Fri)',
                                '09:30 AM – 7:30 PM (Daily)' => '09:30 AM – 7:30 PM (Daily)',
                                '09:00 AM – 7:00 PM (Sun–Fri)' => '09:00 AM – 7:00 PM (Sun–Fri)',
                                '10:00 AM – 9:00 PM (Daily)' => '10:00 AM – 9:00 PM (Daily)',
                                '10:00 AM – 7:00 PM (Closed Saturdays)' => '10:00 AM – 7:00 PM (Closed Saturdays)',
                            ])
                            ->createOptionUsing(fn (string $input) => trim($input))
                            ->native(false)
                            ->helperText('Select a standard retail timetable or type a custom schedule.'),
                    ])->columns(2),

                Section::make('Storefront Media & Publication')
                    ->description('High-resolution outlet photography and customer visibility toggles.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Storefront Photo')
                            ->image()
                            ->disk('public')
                            ->directory('retail-stores')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->columnSpanFull()
                            ->helperText('Upload a storefront or retail showroom photo (JPG, PNG, WebP up to 5MB). Saved to public storage.'),

                        Toggle::make('is_active')
                            ->label('Store Active / Published')
                            ->default(true)
                            ->helperText('Enable to display this store in the public locator and website directory.'),

                        Toggle::make('featured')
                            ->label('Featured Flagship Store')
                            ->default(false)
                            ->helperText('Highlight this store at the top of directory listings and brand showcases.'),
                    ])->columns(2),
            ]);
    }
}
