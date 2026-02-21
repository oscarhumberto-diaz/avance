<article class="testimonies-page">
    <header>
        <h1>Testimonios</h1>
        <p>Historias reales de crecimiento y transformación.</p>
    </header>

    @forelse($testimonies as $testimony)
        <section class="testimony-card">
            <h2>{{ $testimony->author_name }}@if($testimony->age), {{ $testimony->age }} años @endif</h2>
            @if($testimony->stage_principle)
                <p class="meta">Etapa/Principio: {{ $testimony->stage_principle }}</p>
            @endif
            <blockquote>“{{ $testimony->quote }}”</blockquote>

            @if($testimony->type === 'video' && $testimony->video_url)
                <p><a href="{{ $testimony->video_url }}" target="_blank" rel="noopener">Ver testimonio en video</a></p>
            @endif

            @if($testimony->body)
                <p>{!! nl2br(e($testimony->body)) !!}</p>
            @endif
        </section>
    @empty
        <p>No hay testimonios publicados por ahora.</p>
    @endforelse

    {{ $testimonies->links() }}
</article>

<style>
    .testimonies-page { max-width: 900px; margin: 0 auto; padding: 1rem; }
    .testimony-card { border: 1px solid #e5e7eb; border-radius: .75rem; padding: 1rem; margin-bottom: 1rem; background: #fff; }
    .meta { color: #4b5563; font-size: .95rem; }
    blockquote { margin: .75rem 0; font-size: 1.1rem; font-style: italic; }
</style>
