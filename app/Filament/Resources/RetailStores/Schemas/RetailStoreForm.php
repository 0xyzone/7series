<?php

namespace App\Filament\Resources\RetailStores\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RetailStoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('store_type')
                    ->required()
                    ->default('official_store'),
                TextInput::make('city')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('landmark'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('operating_hours')
                    ->default('10:00 AM – 8:00 PM'),
                Textarea::make('google_maps_url')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                Toggle::make('featured')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
