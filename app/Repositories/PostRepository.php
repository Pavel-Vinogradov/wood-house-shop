<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Eloquent\PostModel;

class PostRepository
{
    public function findById(string $id): ?PostModel
    {
        return PostModel::find($id);
    }

    public function findAll(int $page = 1, int $perPage = 12): array
    {
        return PostModel::orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function findPublished(int $page = 1, int $perPage = 12): array
    {
        return PostModel::where('published', true)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page)
            ->items();
    }

    public function save(PostModel $model): void
    {
        $model->save();
    }

    public function delete(string $id): void
    {
        PostModel::destroy($id);
    }

    public function getTotalCount(): int
    {
        return PostModel::count();
    }
}
