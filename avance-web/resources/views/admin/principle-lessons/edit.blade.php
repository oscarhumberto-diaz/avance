<h1>Editar lección: {{ $lesson->title }}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.principles.lessons.update', [$principle, $lesson]) }}" method="post">
    @method('put')
    @include('admin.principle-lessons._form')
</form>
