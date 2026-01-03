<h1>FAQ item bewerken</h1>

@if($errors->any())
  <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
@endif

<form method="POST" action="{{ route('faq-items.update', $item) }}">
  @csrf
  @method('PUT')

  <div>
    <label>Categorie</label><br>
    <select name="faq_category_id" required>
      @foreach($categories as $c)
        <option value="{{ $c->id }}"
          {{ old('faq_category_id', $item->faq_category_id) == $c->id ? 'selected' : '' }}>
          {{ $c->name }}
        </option>
      @endforeach
    </select>
  </div>

  <div>
    <label>Vraag</label><br>
    <input name="question" value="{{ old('question', $item->question) }}" required>
  </div>

  <div>
    <label>Antwoord</label><br>
    <textarea name="answer" rows="6" required>{{ old('answer', $item->answer) }}</textarea>
  </div>

  <button type="submit">Opslaan</button>
</form>

<form method="POST" action="{{ route('faq-items.destroy', $item) }}" style="margin-top:10px;">
  @csrf @method('DELETE')
  <button type="submit">Verwijder</button>
</form>

<p><a href="{{ route('faq-items.index') }}">← Terug</a></p>
