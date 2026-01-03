@extends('layouts.public')
@section('content')
  <h1>Nieuws</h1>

  @if(session('success')) <p>{{ session('success') }}</p> @endif

  <ul>
  @foreach($items as $n)
    <li style="margin-bottom: 16px;">
      <a href="{{ route('news.show', $n) }}">
        <strong>{{ $n->title }}</strong>
      </a>
      <div>{{ $n->published_at->format('d-m-Y') }}</div>

      @if($n->image)
        <img src="{{ asset('storage/'.$n->image) }}" style="max-width:200px;">
      @endif
    </li>
  @endforeach
  </ul>
@endsection