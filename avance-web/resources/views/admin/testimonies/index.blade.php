<h1>Testimonios</h1>

<p><a href="{{ route('admin.testimonies.create') }}">Nuevo testimonio</a></p>

@forelse($testimonies as $testimony)
    <article style="margin-bottom: 16px; border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px;">
        <h2>{{ $testimony->author_name }}</h2>
        <p>
            Tipo: {{ $testimony->type === 'video' ? 'Video' : 'Texto' }} |
            Estado: {{ ucfirst($testimony->status) }}
        </p>
        <p>“{{ $testimony->quote }}”</p>

        <p>
            <a href="{{ route('admin.testimonies.edit', $testimony) }}">Editar</a>
        </p>

        @if($testimony->status !== \App\Models\Testimony::STATUS_APPROVED && $testimony->status !== \App\Models\Testimony::STATUS_PUBLISHED)
            <form method="POST" action="{{ route('admin.testimonies.approve', $testimony) }}" style="display:inline-block; margin-right:8px;">
                @csrf
                @method('PATCH')
                <button type="submit">Aprobar</button>
            </form>
        @endif

        @if($testimony->status !== \App\Models\Testimony::STATUS_PUBLISHED)
            <form method="POST" action="{{ route('admin.testimonies.publish', $testimony) }}" style="display:inline-block; margin-right:8px;">
                @csrf
                @method('PATCH')
                <button type="submit">Publicar</button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.testimonies.destroy', $testimony) }}" onsubmit="return confirm('¿Eliminar testimonio?');" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </article>
@empty
    <p>No hay testimonios registrados.</p>
@endforelse

{{ $testimonies->links() }}
