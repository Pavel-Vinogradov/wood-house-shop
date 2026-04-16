@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Корзина</h1>

    @if($cartItems->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">Ваша корзина пуста</p>
            <a href="{{ route('catalog.index') }}" class="mt-4 inline-block bg-amber-600 text-white px-6 py-2 rounded hover:bg-amber-700">
                Перейти в каталог
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                    <div class="bg-white rounded-lg shadow p-4 flex items-center gap-4">
                        @if($item->product->image)
                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-24 h-24 object-cover rounded">
                        @else
                            <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400 text-sm">Нет фото</span>
                            </div>
                        @endif

                        <div class="flex-1">
                            <h3 class="font-semibold">{{ $item->product->name }}</h3>
                            <p class="text-gray-600">{{ number_format($item->product->price, 0, ',', ' ') }} ₽</p>
                        </div>

                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded px-2 py-1 text-center">
                            <button type="submit" class="bg-amber-600 text-white px-3 py-1 rounded hover:bg-amber-700">
                                Обновить
                            </button>
                        </form>

                        <div class="text-right">
                            <p class="font-bold">{{ number_format($item->product->price * $item->quantity, 0, ',', ' ') }} ₽</p>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="mt-2">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bg-white rounded-lg shadow p-6 h-fit">
                <h2 class="text-xl font-bold mb-4">Итого</h2>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span>Товаров:</span>
                        <span>{{ $cartItems->sum('quantity') }}</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Сумма:</span>
                        <span>{{ number_format($total, 0, ',', ' ') }} ₽</span>
                    </div>
                </div>
                <button class="w-full bg-amber-600 text-white py-3 rounded hover:bg-amber-700 font-semibold">
                    Оформить заказ
                </button>
            </div>
        </div>
    @endif
</div>
@endsection
