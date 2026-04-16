<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view): void
    {
        $sessionId = Session::getId();
        $userId = Auth::id();

        $cartCount = CartItem::where(function ($query) use ($userId, $sessionId): void {
            $query->where('user_id', $userId)
                ->orWhere('session_id', $sessionId);
        })->sum('quantity');

        $view->with('cartCount', $cartCount);
    }
}
