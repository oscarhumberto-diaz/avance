<x-layouts.public :title="$page->title">
    <article class="mx-auto w-full max-w-4xl px-4 py-14 lg:px-6">
        <h1 class="text-3xl font-bold text-slate-900">{{ $page->title }}</h1>

        @if($page->excerpt)
            <p class="mt-2 text-slate-500"><em>{{ $page->excerpt }}</em></p>
        @endif

        <div class="mt-6 whitespace-pre-line leading-relaxed text-slate-700">{!! nl2br(e($page->body)) !!}</div>

        @if($page->children->isNotEmpty())
            <h2 class="mt-10 text-xl font-semibold text-slate-900">Subpáginas</h2>
            <ul class="mt-3 space-y-2">
                @foreach($page->children as $child)
                    <li>
                        <a class="text-blue-700 hover:text-blue-800 hover:underline" href="{{ route('pages.show', $child->slug) }}">{{ $child->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </article>
</x-layouts.public>
