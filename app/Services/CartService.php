<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\CartItem;
use App\Repositories\CartRepository;
use App\Models\Eloquent\ProductModel;
use Illuminate\Database\Eloquent\Collection;

readonly class CartService
{
    public function __construct(
        private CartRepository $cartRepository
    ) {
    }

    public function getCartItems(int|string $userId, string $sessionId): Collection
    {
        return $this->cartRepository->getCartItems($userId, $sessionId);
    }

    public function addToCart(int $productId, int|string $userId, string $sessionId): CartItem
    {
        ProductModel::findOrFail($productId);

        $cartItem = $this->cartRepository->findCartItem($productId, $userId, $sessionId);

        if ($cartItem instanceof CartItem) {
            $this->cartRepository->incrementQuantity($cartItem);
        } else {
            $cartItem = $this->cartRepository->createCartItem([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
                'session_id' => $sessionId,
            ]);
        }

        return $cartItem;
    }

    public function removeFromCart(int $id, int|string $userId, string $sessionId): bool
    {
        $cartItem = $this->cartRepository->findCartItemById($id, $userId, $sessionId);

        if (!$cartItem instanceof CartItem) {
            return false;
        }

        return $this->cartRepository->deleteCartItem($cartItem);
    }

    public function updateQuantity(int $id, int $quantity, int|string $userId, string $sessionId): bool
    {
        $cartItem = $this->cartRepository->findCartItemById($id, $userId, $sessionId);

        if (!$cartItem instanceof CartItem) {
            return false;
        }

        return $this->cartRepository->updateQuantity($cartItem, $quantity);
    }

    public function calculateTotal(Collection $cartItems): float
    {
        return $cartItems->sum(fn ($item): int|float => $item->product->price * $item->quantity);
    }
}
