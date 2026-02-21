<x-layouts.public :title="$page->title">
    <article class="mx-auto grid w-full max-w-5xl gap-6 px-4 py-14 lg:px-6">
        <header class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h1 class="text-3xl font-bold text-slate-900">{{ $page->title }}</h1>
            @if($page->excerpt)
                <p class="mt-2 text-slate-500"><em>{{ $page->excerpt }}</em></p>
            @endif
            @if($page->body)
                <p class="mt-3 whitespace-pre-line text-slate-700">{!! nl2br(e($page->body)) !!}</p>
            @endif
        </header>

        @if($acrosticItems->isNotEmpty())
            <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm"><h2 class="text-xl font-semibold">Acróstico A.V.A.N.C.E.</h2><ul class="mt-4 space-y-2">@foreach($acrosticItems as $item)<li><strong>{{ $item->title }}:</strong> <span>{!! nl2br(e($item->body ?? '')) !!}</span></li>@endforeach</ul></section>
        @endif
        @if($missionComponents->isNotEmpty())
            <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm"><h2 class="text-xl font-semibold">Visión y misión</h2>@foreach($missionComponents as $component)<article class="mt-4"><h3 class="font-semibold">{{ $component->title }}</h3><p class="text-slate-700">{!! nl2br(e($component->body ?? '')) !!}</p></article>@endforeach</section>
        @endif
        @if($objectiveComponents->isNotEmpty())
            <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm"><h2 class="text-xl font-semibold">Objetivos</h2><ul class="mt-4 space-y-2">@foreach($objectiveComponents as $objective)<li><strong>{{ $objective->title }}</strong><p class="text-slate-700">{!! nl2br(e($objective->body ?? '')) !!}</p></li>@endforeach</ul></section>
        @endif
        @if($diagramSteps->isNotEmpty())
            <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-semibold">Proceso AVANCE</h2>
                <svg viewBox="0 0 920 120" role="img" aria-labelledby="avance-process-title avance-process-desc" width="100%" height="120" class="mt-4">
                    <title id="avance-process-title">Diagrama del proceso AVANCE</title>
                    <desc id="avance-process-desc">Preparar, Sembrar, Cuidar y Cosechar.</desc>
                    @foreach($diagramSteps as $step)
                        @php $x = 20 + ($loop->index * 220); @endphp
                        <rect x="{{ $x }}" y="20" width="190" height="60" rx="10" fill="#f2f7ff" stroke="#1f4f9c" stroke-width="2"></rect>
                        <text x="{{ $x + 95 }}" y="57" text-anchor="middle" font-size="18" fill="#1f4f9c">{{ $step->title }}</text>
                        @unless($loop->last)
                            <line x1="{{ $x + 190 }}" y1="50" x2="{{ $x + 220 }}" y2="50" stroke="#1f4f9c" stroke-width="2"></line>
                            <polygon points="{{ $x + 220 }},50 {{ $x + 212 }},45 {{ $x + 212 }},55" fill="#1f4f9c"></polygon>
                        @endunless
                    @endforeach
                </svg>
            </section>
        @endif
    </article>
</x-layouts.public>
