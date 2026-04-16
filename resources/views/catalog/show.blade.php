@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            @if($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto rounded">
            @else
                <div class="w-full h-96 bg-gray-200 rounded flex items-center justify-center">
                    <span class="text-gray-400">Нет фото</span>
                </div>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            
            <p class="text-gray-600 mb-6">{{ $product->description }}</p>
            
            <div class="mb-6">
                <p class="text-3xl font-bold text-amber-600">{{ number_format($product->price, 0, ',', ' ') }} ₽</p>
                @if($product->stock > 0)
                    <p class="text-green-600">В наличии: {{ $product->stock }} шт.</p>
                @else
                    <p class="text-red-600">Нет в наличии</p>
                @endif
            </div>

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4" onsubmit="console.log('Form submitting to:', this.action); return true;">
                @csrf
                @if($product->stock > 0)
                    <button type="submit" class="w-full bg-amber-600 text-white py-3 rounded-lg hover:bg-amber-700 font-semibold text-lg">
                        В корзину
                    </button>
                @else
                    <button type="button" disabled class="w-full bg-gray-400 text-white py-3 rounded-lg font-semibold text-lg cursor-not-allowed">
                        Нет в наличии
                    </button>
                @endif
            </form>

            @if($product->category)
                <div class="text-sm text-gray-500">
                    Категория: <a href="{{ route('catalog.index', ['category' => $product->category->id]) }}" class="text-amber-600 hover:underline">{{ $product->category->name }}</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
