<h1>Editar post</h1>

<form method="POST" action="{{ route('admin.posts.update', $post) }}" style="display: grid; gap: 10px; max-width: 760px;">
    @method('PUT')
    @include('admin.posts._form')
</form>
