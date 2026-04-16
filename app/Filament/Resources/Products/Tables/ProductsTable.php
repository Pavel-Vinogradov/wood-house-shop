<?php

declare(strict_types=1);

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Цена')
                    ->formatStateUsing(fn (float $state): string => number_format($state, 0, ',', ' ') . ' ₽')
                    ->sortable(),
                TextColumn::make('stock')
                    ->label('Остаток')
                    ->sortable(),
                TextColumn::make('active')
                    ->label('Активен')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Да' : 'Нет')
                    ->badge()
                    ->color(fn (bool $state): string => $state ? 'success' : 'danger'),
            ])
            ->filters([

            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
