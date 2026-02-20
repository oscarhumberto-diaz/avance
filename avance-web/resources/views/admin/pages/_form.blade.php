@csrf
<div>
    <label>Título</label>
    <input type="text" name="title" value="{{ old('title', $page->title ?? '') }}" required>
</div>
<div>
    <label>Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $page->slug ?? '') }}">
</div>
<div>
    <label>Extracto</label>
    <input type="text" name="excerpt" value="{{ old('excerpt', $page->excerpt ?? '') }}">
</div>
<div>
    <label>Contenido</label>
    <textarea name="body" rows="8">{{ old('body', $page->body ?? '') }}</textarea>
</div>
<div>
    <label>Estado</label>
    <select name="status" required>
        <option value="draft" @selected(old('status', $page->status ?? '') === 'draft')>Borrador</option>
        <option value="published" @selected(old('status', $page->status ?? '') === 'published')>Publicado</option>
    </select>
</div>
<div>
    <label>Fecha de publicación</label>
    <input type="datetime-local" name="published_at" value="{{ old('published_at', isset($page?->published_at) ? $page->published_at->format('Y-m-d\TH:i') : '') }}">
</div>
<div>
    <label>Página padre</label>
    <select name="parent_id">
        <option value="">Sin padre</option>
        @foreach($parents as $parent)
            <option value="{{ $parent->id }}" @selected((string) old('parent_id', $page->parent_id ?? '') === (string) $parent->id)>{{ $parent->title }}</option>
        @endforeach
    </select>
</div>
<div>
    <label>Orden</label>
    <input type="number" min="0" name="order" value="{{ old('order', $page->order ?? 0) }}">
</div>
<button type="submit">Guardar</button>
