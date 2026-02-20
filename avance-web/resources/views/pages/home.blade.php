<article class="home-page">
    <section class="hero-section">
        <h1>{{ $page->title }}</h1>

        @if($page->excerpt)
            <p class="hero-verse">{{ $page->excerpt }}</p>
        @endif

        @if($featuredVersePage)
            <div class="highlight-verse">
                <h2>{{ $featuredVersePage->title }}</h2>
                @if($featuredVersePage->excerpt)
                    <p><strong>{{ $featuredVersePage->excerpt }}</strong></p>
                @endif
                @if($featuredVersePage->body)
                    <p>{!! nl2br(e($featuredVersePage->body)) !!}</p>
                @endif
            </div>
        @endif
    </section>

    @if($page->body)
        <section class="welcome-section">
            <p>{!! nl2br(e($page->body)) !!}</p>
        </section>
    @endif

    @if($buttonPages->isNotEmpty())
        <section class="home-actions">
            @foreach($buttonPages as $buttonPage)
                <a class="action-button" href="{{ $buttonPage->body ?: route('pages.show', $buttonPage->excerpt ?: $buttonPage->slug) }}">
                    {{ $buttonPage->title }}
                </a>
            @endforeach
        </section>
    @endif

    @if($finalBannerPage)
        <section class="final-banner">
            <h2>{{ $finalBannerPage->title }}</h2>
            @if($finalBannerPage->excerpt)
                <p><strong>{{ $finalBannerPage->excerpt }}</strong></p>
            @endif
            @if($finalBannerPage->body)
                <p>{!! nl2br(e($finalBannerPage->body)) !!}</p>
            @endif
        </section>
    @endif
</article>

<style>
    .home-page {
        max-width: 960px;
        margin: 0 auto;
        padding: 1rem;
        display: grid;
        gap: 1.5rem;
    }

    .hero-section,
    .welcome-section,
    .final-banner {
        padding: 1.25rem;
        border-radius: 0.75rem;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
    }

    .hero-section h1 {
        margin: 0 0 0.75rem;
        font-size: clamp(1.6rem, 2.5vw, 2.25rem);
        line-height: 1.2;
    }

    .hero-verse {
        margin: 0;
        color: #4b5563;
    }

    .highlight-verse {
        margin-top: 1rem;
        padding: 1rem;
        border-radius: 0.5rem;
        background: #ffffff;
        border-left: 4px solid #111827;
    }

    .highlight-verse h2,
    .final-banner h2 {
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    .home-actions {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.75rem;
    }

    .action-button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        min-height: 3rem;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        background: #111827;
        color: #ffffff;
        text-decoration: none;
        text-transform: capitalize;
    }

    .action-button:hover {
        background: #1f2937;
    }

    .final-banner {
        background: #111827;
        color: #ffffff;
        border-color: #111827;
    }

    @media (max-width: 640px) {
        .home-actions {
            grid-template-columns: 1fr;
        }
    }
</style>
