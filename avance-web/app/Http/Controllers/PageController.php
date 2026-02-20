<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $page = Page::published()
            ->with(['children' => fn ($query) => $query->published()])
            ->where('slug', $slug)
            ->firstOrFail();

        if ($page->slug === 'inicio') {
            $buttonPages = $page->children
                ->filter(fn (Page $child) => str_starts_with($child->slug, 'inicio-btn-'))
                ->values();

            $featuredVersePage = $page->children->firstWhere('slug', 'inicio-versiculo-destacado');
            $finalBannerPage = $page->children->firstWhere('slug', 'inicio-banner-final');

            return view('pages.home', compact('page', 'buttonPages', 'featuredVersePage', 'finalBannerPage'));
        }

        return view('pages.show', compact('page'));
    }
}
