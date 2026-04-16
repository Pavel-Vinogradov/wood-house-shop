<?php

declare(strict_types=1);

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('blog')->group(function (): void {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [BlogController::class, 'show'])->name('blog.show');
});

Route::prefix('catalog')->group(function (): void {
    Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/{id}', [CatalogController::class, 'show'])->name('catalog.show');
});
