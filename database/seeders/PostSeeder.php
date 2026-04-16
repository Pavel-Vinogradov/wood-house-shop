<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Eloquent\PostModel;
use Illuminate\Database\Seeder;

final class PostSeeder extends Seeder
{
    public function run(): void
    {
        PostModel::factory()
            ->count(15)
            ->published()
            ->create();

        PostModel::factory()
            ->count(5)
            ->draft()
            ->create();
    }
}
