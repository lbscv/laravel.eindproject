@extends('layouts.admin')

@section('content')
    
  <h1>{{ $news->title }}</h1>
  <p><em>{{ $news->published_at->format('d-m-Y') }}</em></p>

  @if($news->image)
    <img src="{{ asset('storage/'.$news->image) }}" style="max-width:400px;">
  @endif

  <p>{!! nl2br(e($news->content)) !!}</p>

  <p><a href="{{ route('news.index') }}">← terug naar nieuws</a></p>

@endsection
