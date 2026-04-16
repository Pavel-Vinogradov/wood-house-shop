<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CatalogService;
use App\Models\Eloquent\ProductModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct(
        private readonly CatalogService $catalogService
    ) {
    }

    public function index(Request $request): Factory|View
    {
        $page = (int) $request->get('page', 1);
        $perPage = 12;
        $selectedCategory = $request->get('category');

        if ($selectedCategory) {
            $products = $this->catalogService->getProductsByCategory($selectedCategory, $page, $perPage);
        } else {
            $products = $this->catalogService->getActiveProducts($page, $perPage);
        }

        $categories = $this->catalogService->getActiveCategories();
        $totalProducts = $this->catalogService->getTotalProductsCount();
        $totalPages = (int) ceil($totalProducts / $perPage);

        return view('catalog.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    public function show(string $id): Factory|View
    {
        $product = $this->catalogService->getProductById($id);

        if (! $product instanceof ProductModel) {
            abort(404);
        }

        return view('catalog.show', [
            'product' => $product,
        ]);
    }
}
