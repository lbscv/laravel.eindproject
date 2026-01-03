@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Terug --}}
    <p>
        <a href="{{ route('admin.contact-messages.index') }}"
           class="text-sm text-slate-600 hover:text-slate-900">
            ← Terug naar overzicht
        </a>
    </p>

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">Contactbericht #{{ $contactMessage->id }}</h1>
    </div>

    {{-- Success --}}
    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Details --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm px-4 py-5 space-y-3 text-sm">
        <p><strong class="font-medium text-slate-700">Naam:</strong> {{ $contactMessage->name }}</p>
        <p><strong class="font-medium text-slate-700">Email:</strong> {{ $contactMessage->email }}</p>
        <p><strong class="font-medium text-slate-700">Onderwerp:</strong> {{ $contactMessage->subject ?? '-' }}</p>
        <p><strong class="font-medium text-slate-700">Datum:</strong> {{ $contactMessage->created_at->format('d-m-Y H:i') }}</p>
        <p>
            <strong class="font-medium text-slate-700">Status:</strong>
            @if($contactMessage->answered_at)
                <span class="inline-flex items-center rounded-full bg-slate-900 px-2.5 py-1 text-xs font-medium text-white">
                    Beantwoord
                </span>
            @else
                <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-700">
                    Nog niet beantwoord
                </span>
            @endif
        </p>
    </div>

    {{-- Bericht --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm px-4 py-5 space-y-3">
        <h2 class="text-lg font-semibold text-slate-900">Bericht</h2>
        <p class="whitespace-pre-line text-sm text-slate-800">
            {!! nl2br(e($contactMessage->message)) !!}
        </p>
    </div>

    {{-- Antwoord sturen --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm px-4 py-5 space-y-4">
        <h2 class="text-lg font-semibold text-slate-900">Antwoord sturen</h2>

        <form method="POST" action="{{ route('admin.contact-messages.reply', $contactMessage) }}" class="space-y-4">
            @csrf

            <div class="space-y-1">
                <textarea
                    name="reply"
                    rows="6"
                    required
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                ></textarea>

                @error('reply')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                    class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-black hover:bg-slate-800">
                Verstuur antwoord
            </button>
        </form>
    </div>

</div>
@endsection
