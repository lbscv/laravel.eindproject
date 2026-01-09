@extends('layouts.admin')

@section('content')
<div class="max-w-3xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">FAQ item aanmaken</h1>
        <p class="text-sm text-slate-600">
            Maak een nieuwe FAQ vraag en antwoord aan voor de publieke website.
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
          action="{{ route('admin.faq-items.store') }}"
          class="space-y-5 rounded-xl border bg-white p-6 shadow-sm">

        @csrf

        {{-- Categorie --}}
        <div>
            <label class="block text-sm font-medium">Categorie</label>
            <select name="faq_category_id"
                    class="mt-1 w-full rounded-md border px-3 py-2 text-sm"
                    required>
                <option value="">-- kies categorie --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ old('faq_category_id') == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Vraag --}}
        <div>
            <label class="block text-sm font-medium">Vraag</label>
            <input type="text"
                   name="question"
                   value="{{ old('question') }}"
                   class="mt-1 w-full rounded-md border px-3 py-2 text-sm"
                   required>
        </div>

        {{-- Antwoord --}}
        <div>
            <label class="block text-sm font-medium">Antwoord</label>
            <textarea name="answer"
                      rows="6"
                      class="mt-1 w-full rounded-md border px-3 py-2 text-sm"
                      required>{{ old('answer') }}</textarea>
        </div>

        {{-- Actions --}}
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.faq-items.index') }}"
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
