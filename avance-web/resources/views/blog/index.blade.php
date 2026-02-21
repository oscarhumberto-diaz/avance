<h1>Blog</h1>

<form method="GET" action="{{ route('blog.index') }}" style="margin-bottom: 16px;">
    <label for="categoria">Categoría</label>
    <select id="categoria" name="categoria">
        <option value="">Todas</option>
        @foreach($categories as $category)
            <option value="{{ $category }}" @selected($selectedCategory === $category)>{{ str($category)->upper() }}</option>
        @endforeach
    </select>
    <button type="submit">Filtrar</button>
    <a href="{{ route('blog.index') }}">Limpiar</a>
</form>

<p><a href="{{ route('blog.rss') }}">RSS</a></p>

@forelse($posts as $post)
    <article style="margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">
        <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
        <p><strong>{{ $post->categoryLabel() }}</strong> · {{ optional($post->published_at)->format('d/m/Y') ?: 'Sin fecha' }}</p>
        @if($post->excerpt)
            <p>{{ $post->excerpt }}</p>
        @endif
    </article>
@empty
    <p>No hay publicaciones para esta categoría.</p>
@endforelse

{{ $posts->links() }}
