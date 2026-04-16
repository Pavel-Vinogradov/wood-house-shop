<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Eloquent\OrderModel;
use Illuminate\Database\Seeder;

final class OrderSeeder extends Seeder
{
    public function run(): void
    {
        OrderModel::factory()->count(20)->create();
    }
}
