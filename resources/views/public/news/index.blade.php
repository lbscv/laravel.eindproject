@extends('layouts.public')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Nieuws</h1>

    @if(session('success'))
        <p class="mb-4 text-green-600">{{ session('success') }}</p>
    @endif

    <ul class="space-y-6">
        @foreach($items as $n)
            <li class="border-b border-gray-200 pb-4">
                <a 
                    href="{{ route('news.show', $n) }}" 
                    class="text-xl font-semibold text-slate-800 hover:underline"
                >
                    {{ $n->title }}
                </a>

                <div class="text-sm text-gray-500 mt-1">
                    {{ $n->published_at->format('d-m-Y') }}
                </div>

                @if($n->image)
                    <img 
                        src="{{ asset('storage/'.$n->image) }}" 
                        class="mt-3 max-w-xs rounded shadow"
                    >
                @endif
            </li>
        @endforeach
    </ul>

@endsection
