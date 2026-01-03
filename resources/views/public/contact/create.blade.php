@extends('layouts.public')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Contact</h1>

    @if(session('success'))
        <p class="mb-4 text-green-600">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6 max-w-xl">
        @csrf

        {{-- Naam --}}
        <div class="flex flex-col">
            <label class="font-medium mb-1">Naam</label>
            <input 
                name="name" 
                value="{{ old('name') }}" 
                required
                class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-slate-300"
            >
            @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="flex flex-col">
            <label class="font-medium mb-1">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required
                class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-slate-300"
            >
            @error('email')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Onderwerp --}}
        <div class="flex flex-col">
            <label class="font-medium mb-1">Onderwerp</label>
            <input 
                name="subject" 
                value="{{ old('subject') }}"
                class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-slate-300"
            >
            @error('subject')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Bericht --}}
        <div class="flex flex-col">
            <label class="font-medium mb-1">Bericht</label>
            <textarea 
                name="message" 
                rows="6" 
                required
                class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-slate-300"
            >{{ old('message') }}</textarea>
            @error('message')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Verstuur --}}
        <button 
            type="submit"
            class="bg-slate-800 text-black px-5 py-2 rounded hover:bg-slate-700 transition"
        >
            Verstuur
        </button>
    </form>

@endsection
