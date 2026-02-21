<h1>Eventos</h1>
<p><a href="{{ route('admin.events.create') }}">Nuevo evento</a></p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Título</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Visibilidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->starts_at->format('d/m/Y H:i') }}</td>
                <td>{{ $event->ends_at->format('d/m/Y H:i') }}</td>
                <td>{{ $event->visibility }}</td>
                <td>
                    <a href="{{ route('admin.events.edit', $event) }}">Editar</a>
                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}" style="display:inline;" onsubmit="return confirm('¿Eliminar evento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay eventos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $events->links() }}
