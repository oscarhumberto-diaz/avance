<h1>Biblioteca de materiales</h1>

<form method="GET" action="{{ route('materials.index') }}" style="margin-bottom: 20px; display: grid; gap: 8px; max-width: 560px;">
    <div>
        <label for="type">Tipo</label>
        <select id="type" name="type">
            <option value="">Todos</option>
            @foreach($types as $type)
                <option value="{{ $type }}" @selected(($filters['type'] ?? null) === $type)>{{ str($type)->replace('-', ' ')->title() }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="stage">Etapa</label>
        <select id="stage" name="stage">
            <option value="">Todas</option>
            @foreach($stages as $stage)
                <option value="{{ $stage->id }}" @selected((int) ($filters['stage'] ?? 0) === $stage->id)>{{ $stage->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="principle">Principio</label>
        <select id="principle" name="principle">
            <option value="">Todos</option>
            @foreach($principles as $principle)
                <option value="{{ $principle->id }}" @selected((int) ($filters['principle'] ?? 0) === $principle->id)>{{ $principle->title }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit">Filtrar</button>
        <a href="{{ route('materials.index') }}">Limpiar</a>
    </div>
</form>

@forelse($materials as $material)
    <article style="margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">
        <h2>{{ $material->title }}</h2>
        <ul>
            <li><strong>Tipo:</strong> {{ str($material->type)->replace('-', ' ')->title() }}</li>
            <li><strong>Etapa:</strong> {{ $material->stage->name ?? 'Sin etapa' }}</li>
            <li><strong>Principio:</strong> {{ $material->principle->title ?? 'Sin principio' }}</li>
            <li><strong>Tamaño:</strong> {{ number_format($material->file_size / 1024, 2) }} KB</li>
            @if($material->leaders_only)
                <li><strong>Acceso:</strong> Solo líderes</li>
            @endif
        </ul>
        <a href="{{ route('materials.download', $material) }}">Descargar archivo</a>
    </article>
@empty
    <p>No hay materiales para los filtros seleccionados.</p>
@endforelse

{{ $materials->links() }}
