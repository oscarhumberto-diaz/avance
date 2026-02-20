<h1>Nuevo principio para {{ $principleStage->name }}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.principle-stages.principles.store', $principleStage) }}" method="post">
    @include('admin.principles._form')
</form>
