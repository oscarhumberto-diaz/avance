<div style="display:grid;gap:10px;max-width:640px;">
    <label>
        Título
        <input type="text" name="title" value="{{ old('title', $event->title) }}" required maxlength="255">
    </label>

    <label>
        Fecha y hora de inicio
        <input type="datetime-local" name="starts_at" value="{{ old('starts_at', optional($event->starts_at)->format('Y-m-d\TH:i')) }}" required>
    </label>

    <label>
        Fecha y hora de fin
        <input type="datetime-local" name="ends_at" value="{{ old('ends_at', optional($event->ends_at)->format('Y-m-d\TH:i')) }}" required>
    </label>

    <label>
        Ubicación
        <input type="text" name="location" value="{{ old('location', $event->location) }}" maxlength="255">
    </label>

    <label>
        Tipo
        <input type="text" name="type" value="{{ old('type', $event->type) }}" maxlength="120">
    </label>

    <label>
        Descripción
        <textarea name="description" rows="4">{{ old('description', $event->description) }}</textarea>
    </label>

    <label>
        Visibilidad
        <select name="visibility" required>
            @foreach ($visibilities as $visibility)
                <option value="{{ $visibility }}" @selected(old('visibility', $event->visibility ?: 'public') === $visibility)>
                    {{ $visibility }}
                </option>
            @endforeach
        </select>
    </label>
</div>
