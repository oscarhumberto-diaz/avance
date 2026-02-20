<h1>Nueva etapa</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.principle-stages.store') }}" method="post">
    @include('admin.principle-stages._form')
</form>
