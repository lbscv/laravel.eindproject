@extends('layouts.public')

@section('content')

    <h1 class="text-3xl font-bold mb-6">FAQ</h1>

    @forelse($categories as $cat)

        <h2 class="text-xl font-semibold mt-8 mb-3">{{ $cat->name }}</h2>

        @if($cat->items->isEmpty())
            <p class="text-gray-600">Geen vragen in deze categorie.</p>
        @else
            <ul class="space-y-4">
                @foreach($cat->items as $item)
                    <li class="border-b border-gray-200 pb-4">
                        <strong class="block text-slate-800">{{ $item->question }}</strong>
                        <span class="text-gray-700 block mt-1">
                            {!! nl2br(e($item->answer)) !!}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif

    @empty
        <p class="text-gray-600">Nog geen FAQ categorieën.</p>
    @endforelse

@endsection
