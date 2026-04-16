<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Сначала создаем пользователей
        User::factory()->count(10)->create();

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            PostSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
