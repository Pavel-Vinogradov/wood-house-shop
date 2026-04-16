<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Models\Eloquent\CategoryModel;
use App\Models\Eloquent\ProductModel;
use Illuminate\Support\Str;

readonly class CatalogService
{
    public function __construct(
        private ProductRepository $productRepository,
        private CategoryRepository $categoryRepository
    ) {
    }

    public function getActiveProducts(int $page = 1, int $perPage = 12): array
    {
        return $this->productRepository->findActive($page, $perPage);
    }

    public function getProductsByCategory(string $categoryId, int $page = 1, int $perPage = 12): array
    {
        return $this->productRepository->findByCategory($categoryId, $page, $perPage);
    }

    public function getProductById(string $id): ?ProductModel
    {
        return $this->productRepository->findById($id);
    }

    public function getTotalProductsCount(): int
    {
        return $this->productRepository->getTotalCount();
    }

    public function getActiveCategories(): array
    {
        return $this->categoryRepository->findActive();
    }
}
