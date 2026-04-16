<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Models\Eloquent\OrderModel;
use Illuminate\Support\Str;

readonly class OrderService
{
    public function __construct(
        private OrderRepository $orderRepository
    ) {
    }

    public function getAllOrders(int $page = 1, int $perPage = 12): array
    {
        return $this->orderRepository->findAll($page, $perPage);
    }

    public function getOrdersByStatus(string $status, int $page = 1, int $perPage = 12): array
    {
        return $this->orderRepository->findByStatus($status, $page, $perPage);
    }

    public function getOrderById(string $id): ?OrderModel
    {
        return $this->orderRepository->findById($id);
    }

    public function getTotalOrdersCount(): int
    {
        return $this->orderRepository->getTotalCount();
    }

    public function createOrder(array $data): OrderModel
    {
        $model = new OrderModel();
        $model->id = (string) Str::uuid();
        $model->customer_name = $data['customer_name'];
        $model->customer_email = $data['customer_email'];
        $model->customer_phone = $data['customer_phone'];
        $model->status = $data['status'] ?? 'pending';
        $model->total_amount = $data['total_amount'];
        $this->orderRepository->save($model);

        return $model;
    }

    public function updateOrder(string $id, array $data): ?OrderModel
    {
        $model = OrderModel::find($id);
        if (! $model) {
            return null;
        }

        if (isset($data['customer_name'])) {
            $model->customer_name = $data['customer_name'];
        }
        if (isset($data['customer_email'])) {
            $model->customer_email = $data['customer_email'];
        }
        if (isset($data['customer_phone'])) {
            $model->customer_phone = $data['customer_phone'];
        }
        if (isset($data['status'])) {
            $model->status = $data['status'];
        }
        if (isset($data['total_amount'])) {
            $model->total_amount = $data['total_amount'];
        }

        $this->orderRepository->save($model);

        return $model;
    }

    public function deleteOrder(string $id): void
    {
        $this->orderRepository->delete($id);
    }
}
