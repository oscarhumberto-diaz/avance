<h1>Editar principio: {{ $principle->title }}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.principle-stages.principles.update', [$principleStage, $principle]) }}" method="post">
    @method('put')
    @include('admin.principles._form')
</form>
