<h1>Admin - FAQ Vragen</h1>

@if(session('success')) <p>{{ session('success') }}</p> @endif

<p><a href="{{ route('faq-items.create') }}">+ Nieuwe vraag</a></p>
<p><a href="{{ route('faq-categories.index') }}">→ Beheer categorieën</a></p>

<ul>
@foreach($items as $item)
  <li>
    <strong>{{ $item->question }}</strong> ({{ $item->category?->name }})
    <a href="{{ route('faq-items.edit', $item) }}">Bewerk</a>

    <form method="POST" action="{{ route('faq-items.destroy', $item) }}" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit">Verwijder</button>
    </form>
  </li>
@endforeach
</ul>
