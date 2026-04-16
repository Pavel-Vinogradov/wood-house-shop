<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Eloquent\CategoryModel;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        CategoryModel::factory()->count(5)->create();
    }
}
