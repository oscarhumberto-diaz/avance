<x-layouts.public title="Principios">
    <section class="mx-auto w-full max-w-5xl px-4 py-14 lg:px-6">
        <h1 class="text-3xl font-bold">Principios</h1>
        @foreach($stages as $stage)
            <section class="mt-6 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-semibold">{{ $stage->name }}</h2>
                @if($stage->description)<p class="mt-2 text-slate-600">{{ $stage->description }}</p>@endif
                @if($stage->principles->isNotEmpty())
                    <ul class="mt-3 list-disc space-y-1 pl-5">@foreach($stage->principles as $principle)<li>{{ $principle->title }}</li>@endforeach</ul>
                @else
                    <p class="mt-3 text-slate-500">Sin principios registrados.</p>
                @endif
                <a class="mt-4 inline-block text-blue-700 hover:underline" href="{{ route('principles.show', $stage) }}">Ver etapa</a>
            </section>
        @endforeach
    </section>
</x-layouts.public>
