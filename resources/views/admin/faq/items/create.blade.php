@extends('layouts.admin')

@section('content')
   
  <h1>FAQ item aanmaken</h1>

  @if($errors->any())
    <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
  @endif

  <form method="POST" action="{{ route('faq-items.store') }}">
    @csrf

    <div>
      <label>Categorie</label><br>
      <select name="faq_category_id" required>
        <option value="">-- kies --</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" {{ old('faq_category_id') == $c->id ? 'selected' : '' }}>
            {{ $c->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label>Vraag</label><br>
      <input name="question" value="{{ old('question') }}" required>
    </div>

    <div>
      <label>Antwoord</label><br>
      <textarea name="answer" rows="6" required>{{ old('answer') }}</textarea>
    </div>

    <button type="submit">Aanmaken</button>
  </form>

  <p><a href="{{ route('faq-items.index') }}">← Terug</a></p>

@endsection
