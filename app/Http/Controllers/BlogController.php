<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Models\Eloquent\PostModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(
        private readonly BlogService $blogService
    ) {
    }

    public function index(Request $request): Factory|View
    {
        $page = (int) $request->get('page', 1);
        $perPage = 12;

        $posts = $this->blogService->getPublishedPosts($page, $perPage);
        $totalPosts = $this->blogService->getTotalPostsCount();
        $totalPages = (int) ceil($totalPosts / $perPage);

        return view('blog.index', [
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    public function show(string $id): Factory|View
    {
        $post = $this->blogService->getPostById($id);

        if (! $post instanceof PostModel) {
            abort(404);
        }

        return view('blog.show', [
            'post' => $post,
        ]);
    }
}
