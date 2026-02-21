<h1>Blog</h1>

<p><a href="{{ route('admin.posts.create') }}">Nuevo post</a></p>

@forelse($posts as $post)
    <article style="margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #ddd;">
        <h2>{{ $post->title }}</h2>
        <p>
            Categoría: {{ $post->categoryLabel() }} |
            Estado: {{ $post->status === 'published' ? 'Publicado' : 'Borrador' }} |
            Publicación: {{ optional($post->published_at)->format('d/m/Y H:i') ?: 'Sin fecha' }}
        </p>
        <p><a href="{{ route('admin.posts.edit', $post) }}">Editar</a></p>
        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('¿Eliminar post?');">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </article>
@empty
    <p>No hay posts registrados.</p>
@endforelse

{{ $posts->links() }}
