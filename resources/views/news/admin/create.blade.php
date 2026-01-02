<h1>Nieuw nieuwsitem</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Titel</label><br>
        <input name="title" value="{{ old('title') }}">
    </div>

    <div>
        <label>Publicatiedatum</label><br>
        <input type="date" name="published_at" value="{{ old('published_at') }}">
    </div>

    <div>
        <label>Afbeelding</label><br>
        <input type="file" name="image">
    </div>

    <div>
        <label>Content</label><br>
        <textarea name="content" rows="6">{{ old('content') }}</textarea>
    </div>

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('news.index') }}">← Terug</a></p>
