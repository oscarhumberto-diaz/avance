<x-layouts.public :title="$post->title">
    <article class="mx-auto w-full max-w-4xl px-4 py-14 lg:px-6">
        <p><a class="text-blue-700 hover:underline" href="{{ route('blog.index') }}">← Volver al blog</a></p>
        <h1 class="mt-3 text-3xl font-bold">{{ $post->title }}</h1>
        <p class="mt-2 text-sm text-slate-600"><strong>{{ $post->categoryLabel() }}</strong> · {{ optional($post->published_at)->format('d/m/Y H:i') ?: 'Sin fecha' }}</p>
        @if($post->excerpt)<p class="mt-3 italic">{{ $post->excerpt }}</p>@endif
        <div class="prose mt-6 max-w-none">{!! str($post->content)->markdown() !!}</div>
    </article>
</x-layouts.public>
