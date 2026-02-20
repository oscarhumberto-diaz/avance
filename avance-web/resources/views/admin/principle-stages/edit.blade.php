<h1>Editar etapa: {{ $principleStage->name }}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(session('status'))
    <p>{{ session('status') }}</p>
@endif

<form action="{{ route('admin.principle-stages.update', $principleStage) }}" method="post">
    @method('put')
    @include('admin.principle-stages._form')
</form>

<hr>

<h2>Principios</h2>
<p><a href="{{ route('admin.principle-stages.principles.create', $principleStage) }}">Nuevo principio</a></p>

@forelse($principleStage->principles as $principle)
    <article style="margin-bottom: 16px;">
        <h3>{{ $principle->title }} (orden: {{ $principle->order }})</h3>
        @if($principle->description)
            <p>{{ $principle->description }}</p>
        @endif

        <p>
            <a href="{{ route('admin.principle-stages.principles.edit', [$principleStage, $principle]) }}">Editar principio</a>
            <form action="{{ route('admin.principle-stages.principles.destroy', [$principleStage, $principle]) }}" method="post" style="display:inline;">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('¿Eliminar este principio?')">Eliminar principio</button>
            </form>
        </p>

        <h4>Lecciones</h4>
        <p><a href="{{ route('admin.principles.lessons.create', $principle) }}">Nueva lección</a></p>
        @if($principle->lessons->isNotEmpty())
            <ul>
                @foreach($principle->lessons as $lesson)
                    <li>
                        {{ $lesson->title }} (orden: {{ $lesson->order }})
                        <a href="{{ route('admin.principles.lessons.edit', [$principle, $lesson]) }}">Editar</a>
                        <form action="{{ route('admin.principles.lessons.destroy', [$principle, $lesson]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('¿Eliminar esta lección?')">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Sin lecciones.</p>
        @endif
    </article>
@empty
    <p>No hay principios registrados.</p>
@endforelse
