@extends('layouts.admin')

@section('content')
<h1>Nieuws bewerken</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <p>
        <label>Titel</label><br>
        <input type="text" name="title" value="{{ old('title', $news->title) }}">
    </p>

    <p>
        <label>Publicatiedatum</label><br>
        <input type="date" name="published_at" value="{{ old('published_at', optional($news->published_at)->format('Y-m-d')) }}">
    </p>

    <p>
        <label>Content</label><br>
        <textarea name="content" rows="6">{{ old('content', $news->content) }}</textarea>
    </p>

    <p>
        <label>Nieuwe afbeelding (optioneel)</label><br>
        <input type="file" name="image" accept="image/*">
    </p>

    <button type="submit">Opslaan</button>
</form>
@endsection
