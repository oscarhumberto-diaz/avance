<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->string('categoria')->lower()->value();

        $posts = Post::query()
            ->published()
            ->when(in_array($category, Post::CATEGORIES, true), function ($query) use ($category) {
                $query->where('category', $category);
            })
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => Post::CATEGORIES,
            'selectedCategory' => in_array($category, Post::CATEGORIES, true) ? $category : null,
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless($post->status === 'published' && (!$post->published_at || $post->published_at->isPast()), 404);

        return view('blog.show', compact('post'));
    }
}
