<h1>Nuevo material</h1>

<form method="POST" action="{{ route('admin.materials.store') }}" enctype="multipart/form-data" style="display: grid; gap: 10px; max-width: 640px;">
    @include('admin.materials._form')
</form>
