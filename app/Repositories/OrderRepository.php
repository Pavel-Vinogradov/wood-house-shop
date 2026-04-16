<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Eloquent\OrderModel;

class OrderRepository
{
    public function findById(string $id): ?OrderModel
    {
        return OrderModel::find($id);
    }

    public function findAll(int $page = 1, int $perPage = 12): array
    {
        return OrderModel::orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function findByStatus(string $status, int $page = 1, int $perPage = 12): array
    {
        return OrderModel::where('status', $status)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function save(OrderModel $model): void
    {
        $model->save();
    }

    public function delete(string $id): void
    {
        OrderModel::destroy($id);
    }

    public function getTotalCount(): int
    {
        return OrderModel::count();
    }
}
