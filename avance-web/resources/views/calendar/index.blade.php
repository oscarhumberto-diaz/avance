<h1>Calendario de eventos</h1>

<p>
    <a href="{{ route('calendar.index', ['view' => 'month', 'month' => $month->format('Y-m')]) }}">Vista mensual</a>
    |
    <a href="{{ route('calendar.index', ['view' => 'list', 'month' => $month->format('Y-m')]) }}">Vista lista</a>
</p>

@if ($viewMode === 'month')
    <p>
        <a href="{{ route('calendar.index', ['view' => 'month', 'month' => $month->copy()->subMonth()->format('Y-m')]) }}">← Mes anterior</a>
        |
        <strong>{{ $month->translatedFormat('F Y') }}</strong>
        |
        <a href="{{ route('calendar.index', ['view' => 'month', 'month' => $month->copy()->addMonth()->format('Y-m')]) }}">Mes siguiente →</a>
    </p>

    <div style="display:grid;grid-template-columns:repeat(7,minmax(0,1fr));gap:10px;">
        @foreach (['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'] as $weekDay)
            <div style="font-weight:bold;">{{ $weekDay }}</div>
        @endforeach

        @php
            $startGrid = $month->copy()->startOfMonth()->startOfWeek(\Carbon\Carbon::MONDAY);
            $endGrid = $month->copy()->endOfMonth()->endOfWeek(\Carbon\Carbon::SUNDAY);
        @endphp

        @for ($date = $startGrid->copy(); $date->lte($endGrid); $date->addDay())
            @php
                $dayKey = $date->toDateString();
                $dayEvents = $eventsByDay[$dayKey] ?? collect();
                $isCurrentMonth = $date->month === $month->month;
            @endphp
            <div style="border:1px solid #ddd;padding:8px;min-height:110px;opacity:{{ $isCurrentMonth ? '1' : '0.5' }};">
                <div style="font-weight:bold;">{{ $date->format('d') }}</div>
                @foreach ($dayEvents as $event)
                    <div style="margin-top:6px;padding:4px;border-left:3px solid #1976d2;background:#f5f9ff;">
                        <div><strong>{{ $event->title }}</strong></div>
                        <small>{{ $event->starts_at->format('H:i') }} - {{ $event->ends_at->format('H:i') }}</small>
                    </div>
                @endforeach
            </div>
        @endfor
    </div>
@else
    <h2>Próximos eventos</h2>
    @forelse ($timelineEvents as $event)
        <article style="padding:12px;border:1px solid #ddd;margin-bottom:10px;">
            <h3 style="margin:0;">{{ $event->title }}</h3>
            <p style="margin:6px 0 0;">
                {{ $event->starts_at->format('d/m/Y H:i') }} - {{ $event->ends_at->format('d/m/Y H:i') }}
            </p>
            @if ($event->location)
                <p style="margin:6px 0 0;">Ubicación: {{ $event->location }}</p>
            @endif
            @if ($event->type)
                <p style="margin:6px 0 0;">Tipo: {{ $event->type }}</p>
            @endif
            @if ($event->description)
                <p style="margin:6px 0 0;">{{ $event->description }}</p>
            @endif
            <p style="margin:8px 0 0;">
                <a href="{{ route('calendar.export.ics', $event) }}">Agregar a Google (.ics)</a>
                |
                <a href="{{ route('calendar.export.ics', $event) }}">Agregar a Outlook (.ics)</a>
            </p>
        </article>
    @empty
        <p>No hay eventos próximos.</p>
    @endforelse
@endif
