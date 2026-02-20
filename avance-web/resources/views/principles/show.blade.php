<h1>{{ $stage->name }}</h1>

@if($stage->description)
    <p>{{ $stage->description }}</p>
@endif

<p><a href="{{ route('principles.index') }}">← Volver a principios</a></p>

@forelse($stage->principles as $principle)
    <article style="margin-bottom: 24px;">
        <h2>{{ $principle->title }}</h2>
        @if($principle->description)
            <p>{{ $principle->description }}</p>
        @endif

        <h3>Lecciones</h3>
        @if($principle->lessons->isNotEmpty())
            <ol>
                @foreach($principle->lessons as $lesson)
                    <li>
                        <strong>{{ $lesson->title }}</strong>
                        @if($lesson->summary)
                            <p>{{ $lesson->summary }}</p>
                        @endif
                    </li>
                @endforeach
            </ol>
        @else
            <p>Sin lecciones registradas.</p>
        @endif
    </article>
@empty
    <p>Esta etapa todavía no tiene principios.</p>
@endforelse
