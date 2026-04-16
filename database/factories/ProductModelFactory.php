<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Eloquent\ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ProductModelFactory extends Factory
{
    protected $model = ProductModel::class;

    public function definition(): array
    {
        $productNames = [
            'Диван угловой кожаный',
            'Кресло офисное ergonomic',
            'Стол обеденный деревянный',
            'Шкаф для одежды классический',
            'Кровать двуспальная с ортопедическим матрасом',
            'Тумба прикроватная',
            'Комод с 6 ящиками',
            'Полка настенная для книг',
            'Стул кухонный деревянный',
            'Журнальный столик стеклянный',
            'Вешалка напольная',
            'Зеркало в полный рост',
            'Подставка под телевизор',
            'Кухонный гарнитур угловой',
            'Стул барный хромированный',
        ];

        $descriptions = [
            'Высококачественный продукт из натуральных материалов',
            'Современный дизайн и превосходное качество',
            'Идеальное решение для вашего интерьера',
            'Премиальное качество по доступной цене',
            'Надежность и долговечность гарантируются',
            'Стильный и функциональный предмет мебели',
            'Изготовлено с соблюдением всех стандартов качества',
            'Превосходный выбор для современного дома',
        ];

        return [
            'name' => fake()->randomElement($productNames),
            'description' => fake()->randomElement($descriptions) . '. ' . fake()->sentence(),
            'price' => fake()->randomFloat(2, 1000, 50000),
            'image' => fake()->optional()->imageUrl(400, 300),
            'stock' => fake()->numberBetween(0, 100),
            'active' => true,
        ];
    }

    public function withCategory(int $categoryId): self
    {
        return $this->state(fn (): array => ['category_id' => $categoryId]);
    }
}
