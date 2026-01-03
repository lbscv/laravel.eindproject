@extends('layouts.public')
@section('content')
    <h1>{{ $news->title }}</h1>

    <p><strong>Datum:</strong> {{ $news->published_at }}</p>

    @if($news->image)
        <img src="{{ asset('storage/'.$news->image) }}" style="max-width: 400px;">
    @endif

    <p>{!! nl2br(e($news->content)) !!}</p>

    <p><a href="{{ route('admin.news.index') }}">← Terug naar nieuws</a></p>

    @auth
        @if(auth()->user()->is_admin)
            <p><a href="{{ route('admin.news.edit', $news) }}">Bewerk</a></p>
            <form method="POST" action="{{ route('admin.news.destroy', $news) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijder</button>
            </form>
        @endif
    @endauth

@endsection
