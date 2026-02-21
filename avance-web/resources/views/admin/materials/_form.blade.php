@csrf

<div>
    <label for="title">Título</label>
    <input id="title" name="title" type="text" value="{{ old('title', $material->title ?? '') }}" required>
</div>

<div>
    <label for="type">Tipo</label>
    <select id="type" name="type" required>
        @foreach($types as $type)
            <option value="{{ $type }}" @selected(old('type', $material->type ?? '') === $type)>{{ str($type)->replace('-', ' ')->title() }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="principle_stage_id">Etapa</label>
    <select id="principle_stage_id" name="principle_stage_id">
        <option value="">Sin etapa</option>
        @foreach($stages as $stage)
            <option value="{{ $stage->id }}" @selected((int) old('principle_stage_id', $material->principle_stage_id ?? 0) === $stage->id)>{{ $stage->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="principle_id">Principio</label>
    <select id="principle_id" name="principle_id">
        <option value="">Sin principio</option>
        @foreach($principles as $principle)
            <option value="{{ $principle->id }}" @selected((int) old('principle_id', $material->principle_id ?? 0) === $principle->id)>{{ $principle->title }}</option>
        @endforeach
    </select>
</div>

<div>
    <label>
        <input type="checkbox" name="leaders_only" value="1" @checked(old('leaders_only', $material->leaders_only ?? false))>
        Solo líderes
    </label>
</div>

<div>
    <label for="file">Archivo (PDF/PPT/MP4)</label>
    <input id="file" name="file" type="file" accept="application/pdf,.ppt,.pptx,video/mp4">
    @if(isset($material))
        <p>Archivo actual: {{ $material->file_name }}</p>
    @endif
</div>

<button type="submit">Guardar</button>
