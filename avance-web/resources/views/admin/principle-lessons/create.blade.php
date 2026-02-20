<h1>Nueva lección para {{ $principle->title }}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.principles.lessons.store', $principle) }}" method="post">
    @include('admin.principle-lessons._form')
</form>
