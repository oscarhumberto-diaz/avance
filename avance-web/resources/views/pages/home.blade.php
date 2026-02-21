<x-layouts.public :title="$page->title">
    <section class="bg-gradient-to-br from-slate-950 via-blue-900 to-slate-900 text-white">
        <div class="mx-auto grid w-full max-w-6xl gap-8 px-4 py-16 lg:grid-cols-2 lg:px-6 lg:py-24">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-blue-200">Ministerio AVANCE</p>
                <h1 class="mt-3 text-4xl font-bold leading-tight md:text-5xl">{{ $page->title }}</h1>
                @if($page->excerpt)
                    <p class="mt-4 max-w-xl text-base text-blue-100 md:text-lg">{{ $page->excerpt }}</p>
                @endif
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('enrollments.index') }}" class="rounded-md bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-blue-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-blue-900">Inscribirme ahora</a>
                    <a href="{{ route('calendar.index') }}" class="rounded-md border border-blue-300 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-blue-900">Ver calendario</a>
                </div>
            </div>

            <article class="rounded-2xl border border-white/20 bg-white/10 p-6 shadow-xl backdrop-blur">
                <h2 class="text-sm font-semibold uppercase tracking-widest text-blue-100">Versículo destacado · Mateo 28:19</h2>
                @if($featuredVersePage)
                    <p class="mt-4 text-lg font-semibold text-white">{{ $featuredVersePage->title }}</p>
                    @if($featuredVersePage->excerpt)
                        <p class="mt-3 text-blue-50">{{ $featuredVersePage->excerpt }}</p>
                    @endif
                    @if($featuredVersePage->body)
                        <p class="mt-3 text-sm leading-relaxed text-blue-100">{!! nl2br(e($featuredVersePage->body)) !!}</p>
                    @endif
                @else
                    <p class="mt-4 text-blue-50">Id, y haced discípulos a todas las naciones.</p>
                @endif
            </article>
        </div>
    </section>

    <section class="mx-auto w-full max-w-6xl px-4 py-14 lg:px-6">
        <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
            <h2 class="text-2xl font-semibold text-slate-900">Bienvenidos</h2>
            @if($page->body)
                <p class="mt-3 whitespace-pre-line leading-relaxed text-slate-600">{!! nl2br(e($page->body)) !!}</p>
            @endif
        </article>
    </section>

    <section class="mx-auto w-full max-w-6xl px-4 pb-14 lg:px-6">
        <h2 class="text-2xl font-semibold text-slate-900">Accesos rápidos</h2>
        <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach($buttonPages as $buttonPage)
                <a class="group rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-blue-300 hover:shadow" href="{{ $buttonPage->body ?: route('pages.show', $buttonPage->excerpt ?: $buttonPage->slug) }}">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-700" aria-hidden="true">
                            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </span>
                        <h3 class="font-semibold text-slate-900 group-hover:text-blue-700">{{ $buttonPage->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="mx-auto grid w-full max-w-6xl gap-8 px-4 pb-14 lg:grid-cols-2 lg:px-6">
        <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">Próximos eventos</h2>
            @forelse($upcomingEvents as $event)
                <div class="mt-4 border-l-2 border-blue-600 pl-4">
                    <p class="font-semibold text-slate-800">{{ $event->title }}</p>
                    <p class="text-sm text-slate-600">{{ $event->starts_at->format('d/m/Y H:i') }}</p>
                </div>
            @empty
                <p class="mt-4 text-slate-600">Muy pronto compartiremos los próximos encuentros de AVANCE.</p>
            @endforelse
        </article>

        <article class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">Últimos testimonios</h2>
            @forelse($latestTestimonies as $testimony)
                <div class="mt-4 border-l-2 border-slate-300 pl-4">
                    <p class="font-semibold text-slate-800">{{ $testimony->author_name }}</p>
                    <p class="text-sm text-slate-600">“{{ $testimony->quote }}”</p>
                </div>
            @empty
                <p class="mt-4 text-slate-600">Todavía no hay testimonios publicados. ¡Pronto conocerás historias de transformación!</p>
            @endforelse
        </article>
    </section>

    @if($finalBannerPage)
        <section class="mx-auto w-full max-w-6xl px-4 pb-16 lg:px-6">
            <article class="rounded-2xl bg-slate-900 p-8 text-white shadow-lg">
                <h2 class="text-2xl font-semibold">{{ $finalBannerPage->title }}</h2>
                @if($finalBannerPage->excerpt)
                    <p class="mt-2 text-blue-200">{{ $finalBannerPage->excerpt }}</p>
                @endif
                @if($finalBannerPage->body)
                    <p class="mt-4 whitespace-pre-line text-slate-200">{!! nl2br(e($finalBannerPage->body)) !!}</p>
                @endif
            </article>
        </section>
    @endif
</x-layouts.public>
