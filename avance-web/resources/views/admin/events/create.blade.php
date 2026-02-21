<h1>Nuevo evento</h1>

<form method="POST" action="{{ route('admin.events.store') }}">
    @csrf
    @include('admin.events._form')
    <button type="submit">Guardar</button>
</form>
