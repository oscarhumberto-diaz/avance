<h1>Materiales</h1>

<p><a href="{{ route('admin.materials.create') }}">Nuevo material</a></p>

@forelse($materials as $material)
    <article style="margin-bottom: 16px;">
        <h2>{{ $material->title }}</h2>
        <p>
            Tipo: {{ str($material->type)->replace('-', ' ')->title() }} |
            Etapa: {{ $material->stage->name ?? 'Sin etapa' }} |
            Principio: {{ $material->principle->title ?? 'Sin principio' }} |
            Acceso: {{ $material->leaders_only ? 'Solo líderes' : 'Público' }}
        </p>
        <p>
            <a href="{{ route('admin.materials.edit', $material) }}">Editar</a>
        </p>
        <form method="POST" action="{{ route('admin.materials.destroy', $material) }}" onsubmit="return confirm('¿Eliminar material?');">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </article>
@empty
    <p>No hay materiales registrados.</p>
@endforelse

{{ $materials->links() }}
