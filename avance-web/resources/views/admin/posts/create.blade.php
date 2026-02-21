<h1>Nuevo post</h1>

<form method="POST" action="{{ route('admin.posts.store') }}" style="display: grid; gap: 10px; max-width: 760px;">
    @include('admin.posts._form')
</form>
