@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-8">
        <a href="/" class="hover:text-amber-600 transition-colors">Главная</a>
        <span>/</span>
        <a href="/blog" class="hover:text-amber-600 transition-colors">Блог</a>
        <span>/</span>
        <span class="text-gray-900">{{ $post->title }}</span>
    </nav>

    <!-- Article -->
    <article class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
            
            @if($post->published_at)
                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span>
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $post->published_at->format('d.m.Y') }}
                    </span>
                    @if($post->published)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Опубликована</span>
                    @else
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Черновик</span>
                    @endif
                </div>
            @endif
        </div>

        <!-- Image -->
        @if($post->image)
        <div class="mb-8">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg shadow-lg">
        </div>
        @endif

        <!-- Excerpt -->
        @if($post->excerpt)
        <div class="bg-amber-50 border-l-4 border-amber-600 p-4 mb-8 rounded-r-lg">
            <p class="text-gray-700 italic">{{ $post->excerpt }}</p>
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg max-w-none text-gray-700 mb-8">
            {!! $post->content !!}
        </div>

        <!-- Back Button -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <a href="/blog" class="inline-flex items-center text-amber-600 hover:text-amber-700 font-medium transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Назад к блогу
            </a>
        </div>
    </article>
</div>
@endsection
