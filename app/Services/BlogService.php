<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PostRepository;
use App\Models\Eloquent\PostModel;
use Illuminate\Support\Str;

readonly class BlogService
{
    public function __construct(
        private PostRepository $postRepository
    ) {
    }

    public function getPublishedPosts(int $page = 1, int $perPage = 12): array
    {
        return $this->postRepository->findPublished($page, $perPage);
    }

    public function getAllPosts(int $page = 1, int $perPage = 12): array
    {
        return $this->postRepository->findAll($page, $perPage);
    }

    public function getPostById(string $id): ?PostModel
    {
        return $this->postRepository->findById($id);
    }

    public function getTotalPostsCount(): int
    {
        return $this->postRepository->getTotalCount();
    }

    public function createPost(array $data): PostModel
    {
        $model = new PostModel();
        $model->id = (string) Str::uuid();
        $model->title = $data['title'];
        $model->content = $data['content'];
        $model->excerpt = $data['excerpt'] ?? '';
        $model->image = $data['image'] ?? null;
        $model->published = $data['published'] ?? false;
        $model->published_at = $data['published'] ?? false ? now() : null;
        $this->postRepository->save($model);

        return $model;
    }

    public function updatePost(string $id, array $data): ?PostModel
    {
        $model = PostModel::find($id);
        if (! $model) {
            return null;
        }

        if (isset($data['title'])) {
            $model->title = $data['title'];
        }
        if (isset($data['content'])) {
            $model->content = $data['content'];
        }
        if (isset($data['excerpt'])) {
            $model->excerpt = $data['excerpt'];
        }
        if (isset($data['image'])) {
            $model->image = $data['image'];
        }
        if (isset($data['published'])) {
            $model->published = $data['published'];
            $model->published_at = $data['published'] ? now() : null;
        }

        $this->postRepository->save($model);

        return $model;
    }

    public function deletePost(string $id): void
    {
        $this->postRepository->delete($id);
    }
}
