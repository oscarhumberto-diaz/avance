@csrf
<div>
    <label>Título</label>
    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required>
</div>
<div>
    <label>Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}">
</div>
<div>
    <label>Categoría</label>
    <select name="category" required>
        @foreach($categories as $category)
            <option value="{{ $category }}" @selected(old('category', $post->category ?? '') === $category)>{{ str($category)->upper() }}</option>
        @endforeach
    </select>
</div>
<div>
    <label>Extracto</label>
    <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt ?? '') }}">
</div>
<div>
    <label>Contenido (Markdown)</label>
    <div style="display: flex; gap: 8px; margin: 6px 0;">
        <button type="button" onclick="insertMarkdown('**', '**')"><strong>Negrita</strong></button>
        <button type="button" onclick="insertMarkdown('*', '*')"><em>Cursiva</em></button>
        <button type="button" onclick="insertMarkdown('\n## ', '')">H2</button>
        <button type="button" onclick="insertMarkdown('\n- ', '')">Lista</button>
        <button type="button" onclick="insertMarkdown('[texto](', ')')">Link</button>
    </div>
    <textarea id="content-editor" name="content" rows="12">{{ old('content', $post->content ?? '') }}</textarea>
</div>
<div>
    <label>Estado</label>
    <select name="status" required>
        <option value="draft" @selected(old('status', $post->status ?? '') === 'draft')>Borrador</option>
        <option value="published" @selected(old('status', $post->status ?? '') === 'published')>Publicado</option>
    </select>
</div>
<div>
    <label>Fecha de publicación</label>
    <input type="datetime-local" name="published_at" value="{{ old('published_at', isset($post?->published_at) ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
</div>

<h3>SEO básico</h3>
<div>
    <label>Meta title</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}">
</div>
<div>
    <label>Meta description</label>
    <input type="text" name="meta_description" value="{{ old('meta_description', $post->meta_description ?? '') }}">
</div>
<div>
    <label>OG title</label>
    <input type="text" name="og_title" value="{{ old('og_title', $post->og_title ?? '') }}">
</div>
<div>
    <label>OG description</label>
    <input type="text" name="og_description" value="{{ old('og_description', $post->og_description ?? '') }}">
</div>

<button type="submit">Guardar</button>

<script>
    function insertMarkdown(prefix, suffix) {
        const editor = document.getElementById('content-editor');
        if (!editor) {
            return;
        }

        const start = editor.selectionStart;
        const end = editor.selectionEnd;
        const selected = editor.value.substring(start, end);
        const replacement = `${prefix}${selected}${suffix}`;

        editor.setRangeText(replacement, start, end, 'end');
        editor.focus();
    }
</script>
