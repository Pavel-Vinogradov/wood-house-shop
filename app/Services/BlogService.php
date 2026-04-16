<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PostRepository;
use App\Models\Eloquent\PostModel;

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


    public function getPostById(string $id): ?PostModel
    {
        return $this->postRepository->findById($id);
    }

    public function getTotalPostsCount(): int
    {
        return $this->postRepository->getTotalCount();
    }

}
