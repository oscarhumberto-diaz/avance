<h1>Editar material</h1>

<form method="POST" action="{{ route('admin.materials.update', $material) }}" enctype="multipart/form-data" style="display: grid; gap: 10px; max-width: 640px;">
    @method('PUT')
    @include('admin.materials._form')
</form>
