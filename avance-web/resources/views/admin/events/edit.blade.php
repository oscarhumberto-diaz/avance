<h1>Editar evento</h1>

<form method="POST" action="{{ route('admin.events.update', $event) }}">
    @csrf
    @method('PUT')
    @include('admin.events._form')
    <button type="submit">Actualizar</button>
</form>
