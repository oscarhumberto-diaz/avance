<h1>Principios</h1>

@foreach($stages as $stage)
    <section style="margin-bottom: 24px;">
        <h2>{{ $stage->name }}</h2>
        @if($stage->description)
            <p>{{ $stage->description }}</p>
        @endif

        @if($stage->principles->isNotEmpty())
            <ul>
                @foreach($stage->principles as $principle)
                    <li>{{ $principle->title }}</li>
                @endforeach
            </ul>
        @else
            <p>Sin principios registrados.</p>
        @endif

        <a href="{{ route('principles.show', $stage) }}">Ver etapa</a>
    </section>
@endforeach
