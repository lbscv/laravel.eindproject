<h1>FAQ vraag bewerken</h1>

@if($errors->any())
  <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
@endif

<form method="POST" action="{{ route('faq-items.update', $item) }}">
  @csrf
  @method('PUT')

  <label>Categorie</label><br>
  <select name="faq_category_id">
    @foreach($categories as $cat)
      <option value="{{ $cat->id }}" @selected(old('faq_category_id', $item->faq_category_id) == $cat->id)>{{ $cat->name }}</option>
    @endforeach
  </select>

  <br><br>

  <label>Vraag</label><br>
  <input name="question" value="{{ old('question', $item->question) }}">

  <br><br>

  <label>Antwoord</label><br>
  <textarea name="answer" rows="6">{{ old('answer', $item->answer) }}</textarea>

  <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('faq-items.index') }}">← Terug</a></p>
