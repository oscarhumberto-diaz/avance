<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title><![CDATA[Blog AVANCE]]></title>
        <link>{{ url('/blog') }}</link>
        <description><![CDATA[Publicaciones de Doctrina, Noticias, Consejos y FAQ.]]></description>
        <language>es</language>
        <lastBuildDate>{{ now()->toRssString() }}</lastBuildDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title }}]]></title>
                <link>{{ route('blog.show', $post->slug) }}</link>
                <guid isPermaLink="true">{{ route('blog.show', $post->slug) }}</guid>
                <pubDate>{{ optional($post->published_at)->toRssString() ?: $post->created_at->toRssString() }}</pubDate>
                <category><![CDATA[{{ $post->categoryLabel() }}]]></category>
                <description><![CDATA[{{ $post->excerpt ?: str(strip_tags($post->content))->limit(200) }}]]></description>
            </item>
        @endforeach
    </channel>
</rss>
