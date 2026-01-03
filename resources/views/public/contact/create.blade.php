@extends('layouts.public')

@section('content')
    <h1>Contact</h1>

    @if(session('success')) <p>{{ session('success') }}</p> @endif

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div>
            <label>Naam</label><br>
            <input name="name" value="{{ old('name') }}" required>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Onderwerp</label><br>
            <input name="subject" value="{{ old('subject') }}">
            @error('subject') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Bericht</label><br>
            <textarea name="message" rows="6" required>{{ old('message') }}</textarea>
            @error('message') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Verstuur</button>
    </form>
@endsection
