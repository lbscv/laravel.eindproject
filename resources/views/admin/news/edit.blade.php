<h1>Nieuwsitem bewerken</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Titel</label><br>
        <input name="title" value="{{ old('title', $news->title) }}">
    </div>

    <div>
        <label>Publicatiedatum</label><br>
        <input type="date" name="published_at" value="{{ old('published_at', $news->published_at) }}">
    </div>

    <div>
        <label>Nieuwe afbeelding (optioneel)</label><br>
        <input type="file" name="image">
    </div>

    <div>
        <label>Content</label><br>
        <textarea name="content" rows="6">{{ old('content', $news->content) }}</textarea>
    </div>

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('news.show', $news) }}">← Terug</a></p>
