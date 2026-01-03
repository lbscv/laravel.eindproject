@extends('layouts.admin')

@section('content')
<div class="max-w-3xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">Nieuws aanmaken</h1>
        <p class="text-sm text-slate-600">
            Maak een nieuw nieuwsitem aan dat zichtbaar wordt op de publieke website.
        </p>
    </div>

    {{-- Errors --}}
    @if($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST"
          action="{{ route('admin.news.store') }}"
          enctype="multipart/form-data"
          class="space-y-5 rounded-xl border bg-white p-6 shadow-sm">

        @csrf

        {{-- Titel --}}
        <div>
            <label class="block text-sm font-medium">Titel</label>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="mt-1 w-full rounded-md border px-3 py-2 text-sm"
                   required>
        </div>

        {{-- Publicatiedatum --}}
        <div>
            <label class="block text-sm font-medium">Publicatiedatum</label>
            <input type="date"
                   name="published_at"
                   value="{{ old('published_at') }}"
                   class="mt-1 w-full rounded-md border px-3 py-2 text-sm">
        </div>

        {{-- Content --}}
        <div>
            <label class="block text-sm font-medium">Inhoud</label>
            <textarea name="content"
                      rows="6"
                      class="mt-1 w-full rounded-md border px-3 py-2 text-sm"
                      required>{{ old('content') }}</textarea>
        </div>

        {{-- Afbeelding --}}
        <div>
            <label class="block text-sm font-medium">Afbeelding (optioneel)</label>
            <input type="file"
                   name="image"
                   accept="image/*"
                   class="mt-1 w-full text-sm">
        </div>

        {{-- Actions --}}
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.news.index') }}"
               class="rounded-md border px-4 py-2 text-sm hover:bg-slate-50">
                Annuleren
            </a>

            <button type="submit"
                    class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                Opslaan
            </button>
        </div>

    </form>

</div>
@endsection
