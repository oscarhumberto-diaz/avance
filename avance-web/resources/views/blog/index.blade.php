<x-layouts.public title="Blog">
    <section class="mx-auto w-full max-w-5xl px-4 py-14 lg:px-6">
        <h1 class="text-3xl font-bold">Blog</h1>
        <form method="GET" action="{{ route('blog.index') }}" class="mt-4 flex flex-wrap items-end gap-3">
            <label for="categoria" class="text-sm font-medium">Categoría</label>
            <select id="categoria" name="categoria" class="rounded-md border-slate-300"><option value="">Todas</option>@foreach($categories as $category)<option value="{{ $category }}" @selected($selectedCategory === $category)>{{ str($category)->upper() }}</option>@endforeach</select>
            <button type="submit" class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white">Filtrar</button>
            <a href="{{ route('blog.index') }}" class="text-blue-700">Limpiar</a>
        </form>
        <p class="mt-3"><a href="{{ route('blog.rss') }}" class="text-blue-700">RSS</a></p>
        @forelse($posts as $post)
            <article class="mt-6 border-b border-slate-200 pb-4"><h2 class="text-xl font-semibold"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2><p class="text-sm text-slate-600"><strong>{{ $post->categoryLabel() }}</strong> · {{ optional($post->published_at)->format('d/m/Y') ?: 'Sin fecha' }}</p>@if($post->excerpt)<p class="mt-1">{{ $post->excerpt }}</p>@endif</article>
        @empty
            <p class="mt-6">No hay publicaciones para esta categoría.</p>
        @endforelse
        <div class="mt-6">{{ $posts->links() }}</div>
    </section>
</x-layouts.public>
