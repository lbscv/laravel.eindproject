<h1>Nieuwe FAQ categorie</h1>

@if($errors->any())
  <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
@endif

<form method="POST" action="{{ route('faq-categories.store') }}">
  @csrf
  <label>Naam</label><br>
  <input name="name" value="{{ old('name') }}">
  <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('faq-categories.index') }}">← Terug</a></p>
