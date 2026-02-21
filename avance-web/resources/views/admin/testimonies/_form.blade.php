@csrf

<div>
    <label for="type">Tipo</label>
    <select id="type" name="type" required>
        @foreach($types as $type)
            <option value="{{ $type }}" @selected(old('type', $testimony->type ?? 'text') === $type)>{{ $type === 'video' ? 'Video' : 'Texto' }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="author_name">Autor</label>
    <input id="author_name" name="author_name" type="text" value="{{ old('author_name', $testimony->author_name ?? '') }}" required>
</div>

<div>
    <label for="age">Edad (opcional)</label>
    <input id="age" name="age" type="number" min="1" max="120" value="{{ old('age', $testimony->age ?? '') }}">
</div>

<div>
    <label for="stage_principle">Etapa/Principio (opcional)</label>
    <input id="stage_principle" name="stage_principle" type="text" value="{{ old('stage_principle', $testimony->stage_principle ?? '') }}">
</div>

<div>
    <label for="quote">Cita</label>
    <input id="quote" name="quote" type="text" maxlength="500" value="{{ old('quote', $testimony->quote ?? '') }}" required>
</div>

<div>
    <label for="body">Cuerpo</label>
    <textarea id="body" name="body" rows="6">{{ old('body', $testimony->body ?? '') }}</textarea>
</div>

<div>
    <label for="video_url">URL de video</label>
    <input id="video_url" name="video_url" type="url" value="{{ old('video_url', $testimony->video_url ?? '') }}">
</div>

<button type="submit">Guardar</button>
