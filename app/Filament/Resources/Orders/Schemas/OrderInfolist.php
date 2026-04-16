<?php

declare(strict_types=1);

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о заказе')
                    ->components([
                        Text::make('id'),
                        Text::make('user.name'),
                        Text::make('user.email'),
                        Text::make('status'),
                        Text::make('total_amount'),
                        Text::make('created_at'),
                        Text::make('updated_at'),
                    ]),
            ]);
    }
}
