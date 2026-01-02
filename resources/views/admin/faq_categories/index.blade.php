<h1>Admin - FAQ Categorieën</h1>

@if(session('success')) <p>{{ session('success') }}</p> @endif

<p><a href="{{ route('faq-categories.create') }}">+ Nieuwe categorie</a></p>

<ul>
@foreach($categories as $cat)
  <li>
    {{ $cat->name }}
    <a href="{{ route('faq-categories.edit', $cat) }}">Bewerk</a>

    <form method="POST" action="{{ route('faq-categories.destroy', $cat) }}" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit">Verwijder</button>
    </form>
  </li>
@endforeach
</ul>

<p><a href="{{ route('faq-items.index') }}">→ Beheer vragen</a></p>
