@extends('layouts.app')

@section('title', 'Каталог - Wood House Shop')
@section('description', 'Каталог деревянных домов, бань и аксессуаров')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-8">
        <a href="/" class="hover:text-amber-600 transition-colors">Главная</a>
        <span>/</span>
        <span class="text-gray-900">Каталог</span>
    </nav>

    <!-- Title -->
    <h1 class="text-4xl font-bold text-gray-900 mb-8">Каталог</h1>

    <!-- Category Filter -->
    @if($categories)
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="/catalog" class="px-4 py-2 {{ !$selectedCategory ? 'bg-amber-600 text-white' : 'bg-white border border-gray-300 text-gray-700' }} rounded-lg hover:bg-amber-50 transition-colors">
            Все товары
        </a>
        @foreach($categories as $category)
        <a href="/catalog?category={{ $category->id }}" class="px-4 py-2 {{ $selectedCategory === $category->id ? 'bg-amber-600 text-white' : 'bg-white border border-gray-300 text-gray-700' }} rounded-lg hover:bg-amber-50 transition-colors">
            {{ $category->name }}
        </a>
        @endforeach
    </div>
    @endif

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
            <!-- Image Placeholder -->
            <div class="h-48 bg-gray-200 flex items-center justify-center">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @else
                    <img src="https://placehold.co/400x300/f59e0b/ffffff?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                @endif
            </div>

            <!-- Content -->
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    {{ $product->name }}
                </h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                    {{ $product->description }}
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-amber-600">
                        {{ number_format($product->price, 0, ',', ' ') }} ₽
                    </span>
                    @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                            В корзину
                        </button>
                    </form>
                    @else
                    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded-lg">
                        Нет в наличии
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($totalPages > 1)
    <div class="flex justify-center items-center space-x-2 mt-12">
        <!-- Previous Button -->
        @if($currentPage > 1)
        <a href="/catalog?page={{ $currentPage - 1 }}@if($selectedCategory)&category={{ $selectedCategory }}@endif" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        @else
        <span class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </span>
        @endif

        <!-- Page Numbers -->
        @for($i = 1; $i <= $totalPages; $i++)
            @if($i == $currentPage)
                <span class="px-4 py-2 bg-amber-600 text-white rounded-lg">{{ $i }}</span>
            @elseif($i == 1 || $i == $totalPages || ($i >= $currentPage - 1 && $i <= $currentPage + 1))
                <a href="/catalog?page={{ $i }}@if($selectedCategory)&category={{ $selectedCategory }}@endif" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">{{ $i }}</a>
            @elseif($i == $currentPage - 2 || $i == $currentPage + 2)
                <span class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-400">...</span>
            @endif
        @endfor

        <!-- Next Button -->
        @if($currentPage < $totalPages)
        <a href="/catalog?page={{ $currentPage + 1 }}@if($selectedCategory)&category={{ $selectedCategory }}@endif" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
        @else
        <span class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </span>
        @endif
    </div>
    @endif
</div>
@endsection
