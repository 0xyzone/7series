<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Set;

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
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(2),

                Section::make('Content & Media')
                    ->schema([
                        Textarea::make('description')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->directory('products')
                            ->disk('public')
                            ->panelLayout('integrated')
                            ->visibility('public'),
                        Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ])->columns(1),
            ]);
    }
}
