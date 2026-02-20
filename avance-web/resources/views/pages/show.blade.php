<article>
    <h1>{{ $page->title }}</h1>

    @if($page->excerpt)
        <p><em>{{ $page->excerpt }}</em></p>
    @endif

    <div>{!! nl2br(e($page->body)) !!}</div>

    @if($page->children->isNotEmpty())
        <h2>Subpáginas</h2>
        <ul>
            @foreach($page->children as $child)
                <li>
                    <a href="{{ route('pages.show', $child->slug) }}">{{ $child->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</article>
