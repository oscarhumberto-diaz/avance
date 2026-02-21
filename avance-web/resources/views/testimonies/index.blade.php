<x-layouts.public title="Testimonios">
<article class="mx-auto w-full max-w-4xl px-4 py-14 lg:px-6">
    <header>
        <h1 class="text-3xl font-bold">Testimonios</h1>
        <p class="mt-2 text-slate-600">Historias reales de crecimiento y transformación.</p>
    </header>

    @forelse($testimonies as $testimony)
        <section class="mt-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <h2 class="text-xl font-semibold">{{ $testimony->author_name }}@if($testimony->age), {{ $testimony->age }} años @endif</h2>
            @if($testimony->stage_principle)
                <p class="text-sm text-slate-500">Etapa/Principio: {{ $testimony->stage_principle }}</p>
            @endif
            <blockquote class="mt-3 border-l-2 border-blue-500 pl-3 italic">“{{ $testimony->quote }}”</blockquote>

            @if($testimony->type === 'video' && $testimony->video_url)
                <p class="mt-2"><a class="text-blue-700" href="{{ $testimony->video_url }}" target="_blank" rel="noopener">Ver testimonio en video</a></p>
            @endif

            @if($testimony->body)
                <p class="mt-2">{!! nl2br(e($testimony->body)) !!}</p>
            @endif
        </section>
    @empty
        <p class="mt-5">No hay testimonios publicados por ahora.</p>
    @endforelse

    <div class="mt-6">{{ $testimonies->links() }}</div>
</article>
</x-layouts.public>
