<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о статье')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Заголовок')
                            ->columnSpanFull(),
                        TextEntry::make('excerpt')
                            ->label('Отрывок')
                            ->columnSpanFull(),
                        ImageEntry::make('image')
                            ->label('Изображение')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->label('Содержание')
                            ->columnSpanFull()
                            ->markdown()
                            ->html(),
                        TextEntry::make('published')
                            ->label('Опубликована')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Да' : 'Нет')
                            ->badge()
                            ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
                        TextEntry::make('published_at')
                            ->label('Дата публикации')
                            ->dateTime('d.m.Y H:i'),
                        TextEntry::make('created_at')
                            ->label('Создана')
                            ->dateTime('d.m.Y H:i'),
                        TextEntry::make('updated_at')
                            ->label('Обновлена')
                            ->dateTime('d.m.Y H:i'),
                    ])
                    ->columns(2),
            ]);
    }
}
