@extends('layouts.admin')

@section('content')
<h1>Nieuws aanmaken</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf

    <p>
        <label>Titel</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>

    <p>
        <label>Publicatiedatum</label><br>
        <input type="date" name="published_at" value="{{ old('published_at') }}">
    </p>

    <p>
        <label>Content</label><br>
        <textarea name="content" rows="6">{{ old('content') }}</textarea>
    </p>

    <p>
        <label>Afbeelding</label><br>
        <input type="file" name="image" accept="image/*">
    </p>

    <button type="submit">Opslaan</button>
</form>
@endsection
