<h1>Editar testimonio</h1>

<form method="POST" action="{{ route('admin.testimonies.update', $testimony) }}">
    @method('PUT')
    @include('admin.testimonies._form')
</form>
