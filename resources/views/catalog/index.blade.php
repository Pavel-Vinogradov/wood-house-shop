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
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-8">
        <a href="/catalog" class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 p-4 text-center {{ !$selectedCategory ? 'ring-2 ring-amber-600' : '' }}">
            <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-2">
                <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
            <span class="text-sm font-medium {{ !$selectedCategory ? 'text-amber-600' : 'text-gray-700' }}">Все товары</span>
        </a>
        @foreach($categories as $category)
        <a href="/catalog?category={{ $category->id }}" class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 p-4 text-center {{ $selectedCategory === $category->id ? 'ring-2 ring-amber-600' : '' }}">
            <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <span class="text-sm font-medium {{ $selectedCategory === $category->id ? 'text-amber-600' : 'text-gray-700' }}">{{ $category->name }}</span>
        </a>
        @endforeach
    </div>
    @endif

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
            <!-- Image Placeholder -->
            <a href="{{ route('catalog.show', $product->id) }}" class="block h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <img src="https://placehold.co/400x300/f59e0b/ffffff?text=No+Image" alt="No Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @endif
            </a>

            <!-- Content -->
            <div class="p-6">
                <a href="{{ route('catalog.show', $product->id) }}" class="block">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-amber-600 transition-colors">
                        {{ $product->name }}
                    </h3>
                </a>
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                    {{ $product->description }}
                </p>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-amber-600">
                            {{ number_format($product->price, 0, ',', ' ') }} ₽
                        </span>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('catalog.show', $product->id) }}" class="flex-1 text-center px-4 py-2 border-2 border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50 transition-colors">
                            Просмотр
                        </a>
                        @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                                В корзину
                            </button>
                        </form>
                        @else
                        <span class="flex-1 text-center px-4 py-2 bg-gray-300 text-gray-500 rounded-lg">
                            Нет в наличии
                        </span>
                        @endif
                    </div>
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
