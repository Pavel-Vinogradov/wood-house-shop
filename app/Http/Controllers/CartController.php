<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCartRequest;
use App\Services\CartService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct(
        private readonly CartService $cartService
    ) {
    }

    public function index(): Factory|View
    {
        $sessionId = Session::getId();
        $userId = Auth::id();

        $cartItems = $this->cartService->getCartItems($userId, $sessionId);
        $total = $this->cartService->calculateTotal($cartItems);

        return view('cart.index', ['cartItems' => $cartItems, 'total' => $total]);
    }

    public function add($productId): RedirectResponse
    {
        $sessionId = Session::getId();
        $userId = Auth::id();

        $this->cartService->addToCart((int) $productId, $userId, $sessionId);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function remove($id): RedirectResponse
    {
        $sessionId = Session::getId();
        $userId = Auth::id();

        $this->cartService->removeFromCart((int) $id, $userId, $sessionId);

        return redirect()->back()->with('success', 'Товар удалён из корзины');
    }

    public function update(UpdateCartRequest $request, $id): RedirectResponse
    {
        $sessionId = Session::getId();
        $userId = Auth::id();

        $this->cartService->updateQuantity((int) $id, (int) $request->quantity, $userId, $sessionId);

        return redirect()->back()->with('success', 'Количество обновлено');
    }
}
