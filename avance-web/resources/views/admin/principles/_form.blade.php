@csrf

<div>
    <label for="title">Título</label>
    <input id="title" name="title" type="text" value="{{ old('title', $principle->title ?? '') }}" required>
</div>

<div>
    <label for="description">Descripción</label>
    <textarea id="description" name="description" rows="4">{{ old('description', $principle->description ?? '') }}</textarea>
</div>

<div>
    <label for="order">Orden</label>
    <input id="order" name="order" type="number" min="0" value="{{ old('order', $principle->order ?? 0) }}">
</div>

<button type="submit">Guardar</button>
