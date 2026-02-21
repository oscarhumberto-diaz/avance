<x-layouts.public title="Materiales">
<section class="mx-auto w-full max-w-5xl px-4 py-14 lg:px-6">
<h1 class="text-3xl font-bold">Biblioteca de materiales</h1>

<form method="GET" action="{{ route('materials.index') }}" class="mt-5 grid max-w-2xl gap-3 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
    <div>
        <label for="type">Tipo</label>
        <select id="type" name="type" class="ml-2 rounded-md border-slate-300">
            <option value="">Todos</option>
            @foreach($types as $type)
                <option value="{{ $type }}" @selected(($filters['type'] ?? null) === $type)>{{ str($type)->replace('-', ' ')->title() }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="stage">Etapa</label>
        <select id="stage" name="stage" class="ml-2 rounded-md border-slate-300">
            <option value="">Todas</option>
            @foreach($stages as $stage)
                <option value="{{ $stage->id }}" @selected((int) ($filters['stage'] ?? 0) === $stage->id)>{{ $stage->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="principle">Principio</label>
        <select id="principle" name="principle" class="ml-2 rounded-md border-slate-300">
            <option value="">Todos</option>
            @foreach($principles as $principle)
                <option value="{{ $principle->id }}" @selected((int) ($filters['principle'] ?? 0) === $principle->id)>{{ $principle->title }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-white">Filtrar</button>
        <a href="{{ route('materials.index') }}" class="ml-3 text-blue-700">Limpiar</a>
    </div>
</form>

@forelse($materials as $material)
    <article class="mt-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
        <h2 class="text-xl font-semibold">{{ $material->title }}</h2>
        <ul class="mt-2 list-disc pl-5">
            <li><strong>Tipo:</strong> {{ str($material->type)->replace('-', ' ')->title() }}</li>
            <li><strong>Etapa:</strong> {{ $material->stage->name ?? 'Sin etapa' }}</li>
            <li><strong>Principio:</strong> {{ $material->principle->title ?? 'Sin principio' }}</li>
            <li><strong>Tamaño:</strong> {{ number_format($material->file_size / 1024, 2) }} KB</li>
            @if($material->leaders_only)
                <li><strong>Acceso:</strong> Solo líderes</li>
            @endif
        </ul>
        <a class="mt-3 inline-block text-blue-700" href="{{ route('materials.download', $material) }}">Descargar archivo</a>
    </article>
@empty
    <p class="mt-5">No hay materiales para los filtros seleccionados.</p>
@endforelse

<div class="mt-6">{{ $materials->links() }}</div>
</section>
</x-layouts.public>
