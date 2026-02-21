<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class BlogRssController extends Controller
{
    public function __invoke(): Response
    {
        $posts = Post::published()
            ->orderByDesc('published_at')
            ->limit(20)
            ->get();

        $xml = view('blog.rss', compact('posts'))->render();

        return response($xml, 200, [
            'Content-Type' => 'application/rss+xml; charset=UTF-8',
        ]);
    }
}
