<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Eloquent\CategoryModel;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CategoryModelFactory extends Factory
{
    protected $model = CategoryModel::class;

    public function definition(): array
    {
        $categories = [
            'Мебель для гостиной',
            'Мебель для спальни',
            'Мебель для кухни',
            'Мебель для кабинета',
            'Мебель для прихожей',
            'Мебель для ванной',
            'Детская меабель',
            'Уличная мебель',
            'Офисная мебель',
            'Аксессуары для дома',
        ];

        $descriptions = [
            'Качественная мебель для вашего дома',
            'Стильные и комфортные решения',
            'Премиальные материалы и отделка',
            'Современный дизайн и функциональность',
            'Надежность и долговечность',
        ];

        return [
            'name' => fake()->randomElement($categories),
            'description' => fake()->randomElement($descriptions),
            'image' => fake()->optional()->imageUrl(400, 300),
            'active' => true,
        ];
    }
}
