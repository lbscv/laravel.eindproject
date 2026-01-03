@extends('layouts.admin')

@section('content')
    
  <h1>Admin Nieuws aanmaken</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
      <label>Titel</label><br>
      <input name="title" value="{{ old('title') }}" required>
    </div>

    <div>
      <label>Publicatiedatum</label><br>
      <input type="date" name="published_at" value="{{ old('published_at') }}" required>
    </div>

    <div>
      <label>Afbeelding</label><br>
      <input type="file" name="image" accept="image/*">
    </div>

    <div>
      <label>Content</label><br>
      <textarea name="content" rows="8" required>{{ old('content') }}</textarea>
    </div>

    <button type="submit">Aanmaken</button>
  </form>

  <p><a href="{{ route('news.index') }}">← naar nieuws</a></p>

@endsection
