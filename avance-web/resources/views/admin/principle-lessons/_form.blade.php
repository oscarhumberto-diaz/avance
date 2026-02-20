@csrf

<div>
    <label for="title">Título</label>
    <input id="title" name="title" type="text" value="{{ old('title', $lesson->title ?? '') }}" required>
</div>

<div>
    <label for="summary">Resumen</label>
    <textarea id="summary" name="summary" rows="3">{{ old('summary', $lesson->summary ?? '') }}</textarea>
</div>

<div>
    <label for="order">Orden</label>
    <input id="order" name="order" type="number" min="0" value="{{ old('order', $lesson->order ?? 0) }}">
</div>

<button type="submit">Guardar</button>
