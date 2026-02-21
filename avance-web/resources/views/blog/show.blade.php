@php
    $metaTitle = $post->meta_title ?: $post->title;
    $metaDescription = $post->meta_description ?: ($post->excerpt ?: str(strip_tags($post->content))->limit(155));
    $ogTitle = $post->og_title ?: $metaTitle;
    $ogDescription = $post->og_description ?: $metaDescription;
@endphp

<meta name="title" content="{{ $metaTitle }}">
<meta name="description" content="{{ $metaDescription }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ route('blog.show', $post->slug) }}">

<article>
    <p><a href="{{ route('blog.index') }}">← Volver al blog</a></p>
    <h1>{{ $post->title }}</h1>
    <p><strong>{{ $post->categoryLabel() }}</strong> · {{ optional($post->published_at)->format('d/m/Y H:i') ?: 'Sin fecha' }}</p>

    @if($post->excerpt)
        <p><em>{{ $post->excerpt }}</em></p>
    @endif

    <div>{!! str($post->content)->markdown() !!}</div>
</article>
