<h1>Etapas de principios</h1>
<a href="{{ route('admin.principle-stages.create') }}">Nueva etapa</a>

@if(session('status'))
    <p>{{ session('status') }}</p>
@endif

<table border="1" cellpadding="8">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Slug</th>
        <th>Orden</th>
        <th>Principios</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stages as $stage)
        <tr>
            <td>{{ $stage->id }}</td>
            <td>{{ $stage->name }}</td>
            <td>{{ $stage->slug }}</td>
            <td>{{ $stage->order }}</td>
            <td>{{ $stage->principles_count }}</td>
            <td>
                <a href="{{ route('admin.principle-stages.edit', $stage) }}">Editar</a>
                <form action="{{ route('admin.principle-stages.destroy', $stage) }}" method="post" style="display:inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('¿Eliminar esta etapa?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $stages->links() }}
