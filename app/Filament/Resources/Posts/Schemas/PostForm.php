<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о статье')
                    ->schema([
                        TextInput::make('title')
                            ->label('Заголовок')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('excerpt')
                            ->label('Отрывок')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        Textarea::make('content')
                            ->label('Содержание')
                            ->required()
                            ->columnSpanFull()
                            ->rows(10),
                        FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->columnSpanFull(),
                        Toggle::make('published')
                            ->label('Опубликована')
                            ->default(false),
                    ])
                    ->columns(2),
            ]);
    }
}
