<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Set;
use App\Models\Product;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation, $state, Set $set) =>
                                $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->unique(Product::class, ignoreRecord: true),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                        TextInput::make('category'),
                    ])->columns(2),

                Section::make('Content & Media')
                    ->schema([
                        Textarea::make('description')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->directory('products'),
                        Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ])->columns(1),
            ]);
    }
}
