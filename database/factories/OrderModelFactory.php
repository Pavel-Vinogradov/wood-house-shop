<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Eloquent\OrderModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class OrderModelFactory extends Factory
{
    protected $model = OrderModel::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'id' => (string) Str::uuid(),
            'user_id' => $user->id,
            'status' => fake()->randomElement(OrderStatus::cases()),
            'total_amount' => fake()->randomFloat(2, 1000, 100000),
        ];
    }
}
