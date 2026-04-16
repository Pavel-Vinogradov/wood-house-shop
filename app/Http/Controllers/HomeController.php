<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\CatalogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly BlogService $blogService,
        private readonly CatalogService $catalogService
    ) {
    }

    public function index(): Factory|View
    {
        $latestPosts = $this->blogService->getPublishedPosts(1, 3);
        $featuredProducts = $this->catalogService->getActiveProducts(1, 6);

        return view('home', [
            'latestPosts' => $latestPosts,
            'featuredProducts' => $featuredProducts,
        ]);
    }
}
