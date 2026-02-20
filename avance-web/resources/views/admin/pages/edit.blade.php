<h1>Editar página</h1>
<form action="{{ route('admin.pages.update', $page) }}" method="post">
    @method('put')
    @include('admin.pages._form')
</form>
