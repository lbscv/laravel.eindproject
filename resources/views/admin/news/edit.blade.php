@extends('layouts.admin')

@section('content')
    
  <h1>Admin Nieuws bewerken</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
      <label>Titel</label><br>
      <input name="title" value="{{ old('title', $news->title) }}" required>
    </div>

    <div>
      <label>Publicatiedatum</label><br>
      <input type="date" name="published_at"
            value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required>
    </div>

    <div>
      <label>Huidige afbeelding</label><br>
      @if($news->image)
        <img src="{{ asset('storage/'.$news->image) }}" style="max-width:200px;">
      @else
        <p>Geen</p>
      @endif
    </div>

    <div>
      <label>Nieuwe afbeelding (optioneel)</label><br>
      <input type="file" name="image" accept="image/*">
    </div>

    <div>
      <label>Content</label><br>
      <textarea name="content" rows="8" required>{{ old('content', $news->content) }}</textarea>
    </div>

    <button type="submit">Opslaan</button>
  </form>

  <form method="POST" action="{{ route('news.destroy', $news) }}" style="margin-top:10px;">
    @csrf
    @method('DELETE')
    <button type="submit">Verwijderen</button>
  </form>

  <p><a href="{{ route('news.index') }}">← naar nieuws</a></p>

@endsection
