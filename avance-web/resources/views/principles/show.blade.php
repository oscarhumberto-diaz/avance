<x-layouts.public :title="$stage->name">
    <section class="mx-auto w-full max-w-5xl px-4 py-14 lg:px-6">
        <h1 class="text-3xl font-bold">{{ $stage->name }}</h1>
        @if($stage->description)<p class="mt-2 text-slate-600">{{ $stage->description }}</p>@endif
        <p class="mt-3"><a class="text-blue-700 hover:underline" href="{{ route('principles.index') }}">← Volver a principios</a></p>

        @forelse($stage->principles as $principle)
            <article class="mt-6 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-semibold">{{ $principle->title }}</h2>
                @if($principle->description)<p class="mt-2">{{ $principle->description }}</p>@endif
                <h3 class="mt-4 font-semibold">Lecciones</h3>
                @if($principle->lessons->isNotEmpty())
                    <ol class="mt-2 list-decimal space-y-2 pl-5">@foreach($principle->lessons as $lesson)<li><strong>{{ $lesson->title }}</strong>@if($lesson->summary)<p>{{ $lesson->summary }}</p>@endif</li>@endforeach</ol>
                @else
                    <p class="mt-2 text-slate-500">Sin lecciones registradas.</p>
                @endif
            </article>
        @empty
            <p class="mt-6">Esta etapa todavía no tiene principios.</p>
        @endforelse
    </section>
</x-layouts.public>
