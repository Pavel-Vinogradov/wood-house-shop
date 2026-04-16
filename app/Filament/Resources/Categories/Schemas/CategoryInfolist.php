<?php

declare(strict_types=1);

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о категории')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Название'),
                        TextEntry::make('description')
                            ->label('Описание')
                            ->columnSpanFull(),
                        ImageEntry::make('image')
                            ->label('Изображение')
                            ->columnSpanFull(),
                        TextEntry::make('active')
                            ->label('Активна')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Да' : 'Нет')
                            ->badge()
                            ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
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
