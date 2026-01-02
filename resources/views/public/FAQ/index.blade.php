<h1>FAQ</h1>

@foreach($categories as $cat)
  <h2>{{ $cat->name }}</h2>
  <ul>
    @forelse($cat->items as $item)
      <li>
        <strong>{{ $item->question }}</strong><br>
        {!! nl2br(e($item->answer)) !!}
      </li>
    @empty
      <li>Geen vragen in deze categorie.</li>
    @endforelse
  </ul>
@endforeach
