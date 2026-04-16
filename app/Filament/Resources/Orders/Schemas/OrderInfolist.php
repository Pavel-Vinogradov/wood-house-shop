<?php

declare(strict_types=1);

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о заказе')
                    ->schema([
                        TextEntry::make('id')
                            ->label('ID'),
                        TextEntry::make('user.name')
                            ->label('Имя клиента'),
                        TextEntry::make('user.email')
                            ->label('Email клиента'),
                        TextEntry::make('status')
                            ->label('Статус')
                            ->formatStateUsing(fn ( OrderStatus $state): string => $state->getLabel())
                            ->badge()
                            ->color(fn (OrderStatus $state): string => $state->getColor()),
                        TextEntry::make('total_amount')
                            ->label('Сумма')
                            ->money('RUB'),
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
