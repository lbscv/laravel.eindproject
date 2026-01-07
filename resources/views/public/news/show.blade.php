@extends('layouts.public')

@section('content')

    <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

    <p class="text-gray-600 mb-4">
        <strong>Datum:</strong> {{ $news->published_at }}
    </p>

    @if($news->image)
        <img 
            src="{{ asset('storage/'.$news->image) }}" 
            class="max-w-md rounded shadow mb-6"
        >
    @endif

    <div class="prose max-w-none mb-8">
        {!! nl2br(e($news->content)) !!}
    </div>

    {{-- TERUG NAAR NIEUWS --}}
    <p class="mb-8">
        <a 
            href="{{ route('news.index') }}"
            class="inline-block px-4 py-2 rounded border border-slate-800 text-slate-800 hover:bg-slate-100 transition"
        >
            ← Terug naar nieuws
        </a>
    </p>

    @auth
        @if(auth()->user()->is_admin)
            <div class="flex items-center gap-4">

                {{-- BEWERK --}}
                <a 
                    href="{{ route('admin.news.edit', $news) }}" 
                    class="inline-block px-4 py-2 rounded border border-blue-700 text-blue-700 hover:bg-blue-50 transition"
                >
                    Bewerk
                </a>

                {{-- VERWIJDER --}}
                <form 
                    method="POST" 
                    action="{{ route('admin.news.destroy', $news) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button 
                        type="submit"
                        class="px-4 py-2 rounded border border-red-700 text-red-700 hover:bg-red-50 transition"
                    >
                        Verwijder
                    </button>
                </form>

            </div>
        @endif
    @endauth

@endsection
