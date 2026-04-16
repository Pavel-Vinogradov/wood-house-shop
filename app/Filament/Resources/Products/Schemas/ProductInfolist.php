<?php

declare(strict_types=1);

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о товаре')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Название')
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->label('Описание')
                            ->columnSpanFull(),
                        ImageEntry::make('image')
                            ->label('Изображение')
                            ->columnSpanFull(),
                        TextEntry::make('price')
                            ->label('Цена')
                            ->money('RUB'),
                        TextEntry::make('stock')
                            ->label('Остаток')
                            ->badge()
                            ->color(fn (int $state): string => $state > 0 ? 'success' : 'danger'),
                        TextEntry::make('active')
                            ->label('Активен')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Да' : 'Нет')
                            ->badge()
                            ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
                        TextEntry::make('category.name')
                            ->label('Категория'),
                        TextEntry::make('created_at')
                            ->label('Создан')
                            ->dateTime('d.m.Y H:i'),
                        TextEntry::make('updated_at')
                            ->label('Обновлён')
                            ->dateTime('d.m.Y H:i'),
                    ])
                    ->columns(2),
            ]);
    }
}
