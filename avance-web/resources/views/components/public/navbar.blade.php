@php
    $menuItems = [
        ['label' => 'Inicio', 'route' => 'home'],
        ['label' => 'Principios', 'route' => 'principles.index'],
        ['label' => 'Calendario', 'route' => 'calendar.index'],
        ['label' => 'Materiales', 'route' => 'materials.index'],
        ['label' => 'Inscripciones', 'route' => 'enrollments.index'],
        ['label' => 'Testimonios', 'route' => 'testimonies.index'],
        ['label' => 'Contacto', 'route' => 'pages.show', 'params' => ['slug' => 'contacto']],
    ];
@endphp

<header class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/90 backdrop-blur">
    <div class="mx-auto flex w-full max-w-6xl items-center justify-between gap-4 px-4 py-3 lg:px-6">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-md text-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 focus-visible:ring-offset-2">
            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-blue-700 font-bold text-white">A</span>
            <div>
                <p class="text-sm font-semibold tracking-[0.3em] text-blue-700">AVANCE</p>
                <p class="text-xs text-slate-500">Formación y discipulado</p>
            </div>
        </a>

        <nav aria-label="Navegación principal" class="hidden items-center gap-1 md:flex">
            @foreach($menuItems as $item)
                @php
                    $isActive = request()->routeIs($item['route']);
                    $url = isset($item['params']) ? route($item['route'], $item['params']) : route($item['route']);
                @endphp
                <a href="{{ $url }}" class="rounded-md px-3 py-2 text-sm font-medium transition hover:bg-slate-100 hover:text-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 focus-visible:ring-offset-2 {{ $isActive ? 'bg-blue-50 text-blue-700' : 'text-slate-600' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <a href="{{ route('enrollments.index') }}" class="inline-flex items-center rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 focus-visible:ring-offset-2">
            Inscribirme
        </a>
    </div>
</header>
