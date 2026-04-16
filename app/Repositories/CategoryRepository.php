<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Eloquent\CategoryModel;

class CategoryRepository
{
    public function findById(string $id): ?CategoryModel
    {
        return CategoryModel::find($id);
    }

    public function findAll(): array
    {
        return CategoryModel::orderBy('name')->get()->all();
    }

    public function findActive(): array
    {
        return CategoryModel::where('active', true)->orderBy('name')->get()->all();
    }

    public function save(CategoryModel $model): void
    {
        $model->save();
    }

    public function delete(string $id): void
    {
        CategoryModel::destroy($id);
    }
}
