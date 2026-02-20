<h1>Gestión de páginas</h1>
<a href="{{ route('admin.pages.create') }}">Nueva página</a>

@if(session('status'))
    <p>{{ session('status') }}</p>
@endif

<table border="1" cellpadding="8">
    <thead>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Slug</th>
        <th>Padre</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->title }}</td>
            <td>{{ $page->slug }}</td>
            <td>{{ $page->parent?->title ?? '—' }}</td>
            <td>{{ $page->status }}</td>
            <td>
                <a href="{{ route('admin.pages.edit', $page) }}">Editar</a>
                <form action="{{ route('admin.pages.destroy', $page) }}" method="post" style="display:inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('¿Eliminar esta página?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $pages->links() }}
