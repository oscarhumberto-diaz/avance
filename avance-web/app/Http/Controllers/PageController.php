<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Collection;
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

        if ($page->slug === 'que-es-avance') {
            $acrosticItems = $this->contentComponents($page->children, 'que-es-avance-acrostico-');
            $missionComponents = $this->contentComponents($page->children, 'que-es-avance-mision-');
            $objectiveComponents = $this->contentComponents($page->children, 'que-es-avance-objetivo-');
            $diagramSteps = $this->contentComponents($page->children, 'que-es-avance-diagrama-');

            return view(
                'pages.about-avance',
                compact('page', 'acrosticItems', 'missionComponents', 'objectiveComponents', 'diagramSteps')
            );
        }

        return view('pages.show', compact('page'));
    }

    private function contentComponents(Collection $children, string $prefix): Collection
    {
        return $children
            ->filter(fn (Page $child) => str_starts_with($child->slug, $prefix))
            ->sortBy('order')
            ->values();
    }
}
