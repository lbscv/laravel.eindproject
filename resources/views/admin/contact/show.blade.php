@extends('layouts.admin')

@section('content')
    <p>
        <a href="{{ route('admin.contact-messages.index') }}">← Terug naar overzicht</a>
    </p>

    <h1>Contactbericht #{{ $contactMessage->id }}</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p><strong>Naam:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p><strong>Onderwerp:</strong> {{ $contactMessage->subject ?? '-' }}</p>
    <p><strong>Datum:</strong> {{ $contactMessage->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Status:</strong>
        {{ $contactMessage->answered_at ? 'Beantwoord' : 'Nog niet beantwoord' }}
    </p>

    <hr>

    <h2>Bericht</h2>
    <p>{!! nl2br(e($contactMessage->message)) !!}</p>

    <hr>

    <h2>Antwoord sturen</h2>

    <form method="POST" action="{{ route('admin.contact-messages.reply', $contactMessage) }}">
        @csrf

        <div>
            <textarea name="reply" rows="6" style="width:100%;" required></textarea>
            @error('reply') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Verstuur antwoord</button>
    </form>
@endsection
