@extends('layouts.public')
@section('content')
    <h1>FAQ</h1>

  @forelse($categories as $cat)
    <h2 style="margin-top: 20px;">{{ $cat->name }}</h2>

    @if($cat->items->isEmpty())
      <p>Geen vragen in deze categorie.</p>
    @else
      <ul>
        @foreach($cat->items as $item)
          <li style="margin-bottom: 10px;">
            <strong>{{ $item->question }}</strong><br>
            <span>{!! nl2br(e($item->answer)) !!}</span>
          </li>
        @endforeach
      </ul>
    @endif
  @empty
    <p>Nog geen FAQ categorieën.</p>
  @endforelse
@endsection

