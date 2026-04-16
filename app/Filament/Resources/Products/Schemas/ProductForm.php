<?php

declare(strict_types=1);

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о товаре')
                    ->schema([
                        TextInput::make('name')
                            ->label('Название')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('description')
                            ->label('Описание')
                            ->maxLength(1000)
                            ->columnSpanFull(),
                        TextInput::make('price')
                            ->label('Цена')
                            ->required()
                            ->numeric()
                            ->prefix('₽'),
                        TextInput::make('stock')
                            ->label('Остаток')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Select::make('category_id')
                            ->label('Категория')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload(),
                        FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Активен')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
