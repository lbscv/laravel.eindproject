<h1>Admin - FAQ Items</h1>
@if(session('success')) <p>{{ session('success') }}</p> @endif

<p>
  <a href="{{ route('faq-items.create') }}">+ Nieuw item</a> |
  <a href="{{ route('faq-categories.index') }}">Categorieën</a>
</p>

<table border="1" cellpadding="6">
  <tr>
    <th>ID</th><th>Categorie</th><th>Vraag</th><th>Acties</th>
  </tr>
  @foreach($items as $i)
    <tr>
      <td>{{ $i->id }}</td>
      <td>{{ $i->category?->name }}</td>
      <td>{{ $i->question }}</td>
      <td>
        <a href="{{ route('faq-items.edit', $i) }}">Bewerk</a>
        <form method="POST" action="{{ route('faq-items.destroy', $i) }}" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit">Verwijder</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>
