<article>
    <header>
        <h1>{{ $page->title }}</h1>

        @if($page->excerpt)
            <p><em>{{ $page->excerpt }}</em></p>
        @endif

        @if($page->body)
            <p>{!! nl2br(e($page->body)) !!}</p>
        @endif
    </header>

    @if($acrosticItems->isNotEmpty())
        <section>
            <h2>Acróstico A.V.A.N.C.E.</h2>
            <ul>
                @foreach($acrosticItems as $item)
                    <li>
                        <strong>{{ $item->title }}:</strong>
                        <span>{!! nl2br(e($item->body ?? '')) !!}</span>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif

    @if($missionComponents->isNotEmpty())
        <section>
            <h2>Visión y misión</h2>
            @foreach($missionComponents as $component)
                <article>
                    <h3>{{ $component->title }}</h3>
                    <p>{!! nl2br(e($component->body ?? '')) !!}</p>
                </article>
            @endforeach
        </section>
    @endif

    @if($objectiveComponents->isNotEmpty())
        <section>
            <h2>Objetivos</h2>
            <ul>
                @foreach($objectiveComponents as $objective)
                    <li>
                        <strong>{{ $objective->title }}</strong>
                        <p>{!! nl2br(e($objective->body ?? '')) !!}</p>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif

    @if($diagramSteps->isNotEmpty())
        <section>
            <h2>Proceso AVANCE</h2>

            <svg viewBox="0 0 920 120" role="img" aria-labelledby="avance-process-title avance-process-desc" width="100%" height="120">
                <title id="avance-process-title">Diagrama del proceso AVANCE</title>
                <desc id="avance-process-desc">Preparar, Sembrar, Cuidar y Cosechar.</desc>
                @foreach($diagramSteps as $step)
                    @php
                        $x = 20 + ($loop->index * 220);
                    @endphp
                    <rect x="{{ $x }}" y="20" width="190" height="60" rx="10" fill="#f2f7ff" stroke="#1f4f9c" stroke-width="2"></rect>
                    <text x="{{ $x + 95 }}" y="57" text-anchor="middle" font-size="18" fill="#1f4f9c">{{ $step->title }}</text>

                    @unless($loop->last)
                        <line x1="{{ $x + 190 }}" y1="50" x2="{{ $x + 220 }}" y2="50" stroke="#1f4f9c" stroke-width="2"></line>
                        <polygon points="{{ $x + 220 }},50 {{ $x + 212 }},45 {{ $x + 212 }},55" fill="#1f4f9c"></polygon>
                    @endunless
                @endforeach
            </svg>

            <ol>
                @foreach($diagramSteps as $step)
                    <li>
                        <strong>{{ $step->title }}:</strong>
                        <span>{!! nl2br(e($step->body ?? '')) !!}</span>
                    </li>
                @endforeach
            </ol>
        </section>
    @endif
</article>
