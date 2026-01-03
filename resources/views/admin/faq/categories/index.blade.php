@extends('layouts.admin')

@section('content')
   
<h1>Admin - FAQ Categorieën</h1>
@if(session('success')) <p>{{ session('success') }}</p> @endif

<p><a href="{{ route('faq-categories.create') }}">+ Nieuwe categorie</a></p>

<table border="1" cellpadding="6">
  <tr>
    <th>ID</th><th>Naam</th><th># items</th><th>Acties</th>
  </tr>
  @foreach($categories as $c)
    <tr>
      <td>{{ $c->id }}</td>
      <td>{{ $c->name }}</td>
      <td>{{ $c->items_count }}</td>
      <td>
        <a href="{{ route('faq-categories.edit', $c) }}">Bewerk</a>
        <form method="POST" action="{{ route('faq-categories.destroy', $c) }}" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit">Verwijder</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

<p><a href="{{ route('faq-items.index') }}">→ Naar FAQ items</a></p>

@endsection
