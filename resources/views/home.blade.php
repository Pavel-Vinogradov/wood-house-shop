@extends('layouts.app')

@section('title', 'Wood House Shop - Wooden Houses and Saunas')
@section('description', 'Quality wooden houses and saunas for your perfect home')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-amber-600 to-amber-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-5xl font-bold mb-6">Деревянные дома и бани вашей мечты</h1>
            <p class="text-xl mb-8 opacity-90">Качественные деревянные конструкции для комфортной жизни и отдыха</p>
            <div class="flex space-x-4">
                <a href="/catalog" class="px-8 py-3 bg-white text-amber-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    Смотреть каталог
                </a>
                <a href="/blog" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-amber-600 transition-colors">
                    Читать блог
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Популярные товары</h2>
            <a href="/catalog" class="text-amber-600 hover:text-amber-700 font-medium transition-colors">
                Все товары →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProducts as $product)
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
                        <button class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                            В корзину
                        </button>
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
    </div>
</section>

<!-- Latest Blog Posts Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Последние статьи</h2>
            <a href="/blog" class="text-amber-600 hover:text-amber-700 font-medium transition-colors">
                Все статьи →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                <!-- Image Placeholder -->
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    @if($post->image)
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://placehold.co/400x300/f59e0b/ffffff?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        {{ $post->title }}
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3">
                        {{ $post->excerpt }}
                    </p>
                    <a href="/blog/{{ $post->id }}" class="inline-block mt-4 text-amber-600 hover:text-amber-700 font-medium transition-colors">
                        Читать далее →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Почему выбирают нас</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Качество</h3>
                <p class="text-gray-600">Используем только качественные материалы и проверенные технологии</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Сроки</h3>
                <p class="text-gray-600">Соблюдаем сроки строительства и доставки</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Опыт</h3>
                <p class="text-gray-600">Более 10 лет опыта в строительстве деревянных домов</p>
            </div>
        </div>
    </div>
</section>
@endsection
