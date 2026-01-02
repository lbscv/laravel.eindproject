<h1>Nieuws</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<ul>
@forelse($news as $item)
    <li>
        <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
        ({{ $item->published_at }})
    </li>
@empty
    <li>Geen nieuwsitems.</li>
@endforelse
</ul>

@auth
    @if(auth()->user()->is_admin)
        <p><a href="{{ route('news.create') }}">+ Nieuw nieuwsitem</a></p>
    @endif
@endauth
