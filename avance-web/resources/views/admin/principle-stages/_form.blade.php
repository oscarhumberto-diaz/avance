@csrf

<div>
    <label for="name">Nombre</label>
    <input id="name" name="name" type="text" value="{{ old('name', $principleStage->name ?? '') }}" required>
</div>

<div>
    <label for="slug">Slug</label>
    <input id="slug" name="slug" type="text" value="{{ old('slug', $principleStage->slug ?? '') }}">
</div>

<div>
    <label for="description">Descripción</label>
    <textarea id="description" name="description" rows="4">{{ old('description', $principleStage->description ?? '') }}</textarea>
</div>

<div>
    <label for="order">Orden</label>
    <input id="order" name="order" type="number" min="0" value="{{ old('order', $principleStage->order ?? 0) }}">
</div>

<button type="submit">Guardar</button>
