<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Eloquent\ProductModel;

class ProductRepository
{
    public function findById(string $id): ?ProductModel
    {
        return ProductModel::find($id);
    }

    public function findAll(int $page = 1, int $perPage = 12): array
    {
        return ProductModel::orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function findByCategory(string $categoryId, int $page = 1, int $perPage = 12): array
    {
        return ProductModel::where('category_id', $categoryId)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function findActive(int $page = 1, int $perPage = 12): array
    {
        return ProductModel::where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function save(ProductModel $model): void
    {
        $model->save();
    }

    public function delete(string $id): void
    {
        ProductModel::destroy($id);
    }

    public function getTotalCount(): int
    {
        return ProductModel::count();
    }
}
