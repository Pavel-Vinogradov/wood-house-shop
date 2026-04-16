<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Eloquent\CategoryModel;
use App\Models\Eloquent\ProductModel;
use Illuminate\Database\Seeder;

final class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = CategoryModel::all();

        foreach ($categories as $category) {
            ProductModel::factory()
                ->count(10)
                ->withCategory($category->id)
                ->create();
        }
    }
}
