<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CartItem;

class CartRepository
{
    public function getCartItems(int|string $userId, string $sessionId): \Illuminate\Database\Eloquent\Collection
    {
        return CartItem::with('product')
            ->where(function ($query) use ($userId, $sessionId): void {
                $query->where('user_id', $userId)
                    ->orWhere('session_id', $sessionId);
            })
            ->get();
    }

    public function findCartItem(int $productId, int|string $userId, string $sessionId): ?CartItem
    {
        return CartItem::where('product_id', $productId)
            ->where(function ($query) use ($userId, $sessionId): void {
                $query->where('user_id', $userId)
                    ->orWhere('session_id', $sessionId);
            })
            ->first();
    }

    public function createCartItem(array $data): CartItem
    {
        return CartItem::create($data);
    }

    public function incrementQuantity(CartItem $cartItem): int|false
    {
        return $cartItem->increment('quantity');
    }

    public function updateQuantity(CartItem $cartItem, int $quantity): bool
    {
        return $cartItem->update(['quantity' => $quantity]);
    }

    public function deleteCartItem(CartItem $cartItem): bool
    {
        return $cartItem->delete();
    }

    public function findCartItemById(int $id, int|string $userId, string $sessionId): ?CartItem
    {
        return CartItem::where('id', $id)
            ->where(function ($query) use ($userId, $sessionId): void {
                $query->where('user_id', $userId)
                    ->orWhere('session_id', $sessionId);
            })
            ->first();
    }
}
