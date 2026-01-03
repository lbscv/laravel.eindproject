@extends('layouts.admin')

@section('content')
<div class="max-w-2xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">FAQ item bewerken</h1>
        <p class="text-sm text-slate-600">
            Pas de categorie, vraag en het antwoord aan.
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

    {{-- Edit form --}}
    <form method="POST"
          action="{{ route('admin.faq-items.update', $item) }}"
          class="space-y-5 rounded-xl border bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')

        {{-- Category --}}
        <div>
            <label class="block text-sm font-medium">Categorie</label>
            <select name="faq_category_id"
                    required
                    class="mt-1 w-full rounded-md border px-3 py-2 text-sm">
                @foreach($categories as $c)
                    <option value="{{ $c->id }}"
                        {{ old('faq_category_id', $item->faq_category_id) == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Question --}}
        <div>
            <label class="block text-sm font-medium">Vraag</label>
            <input type="text"
                   name="question"
                   value="{{ old('question', $item->question) }}"
                   required
                   class="mt-1 w-full rounded-md border px-3 py-2 text-sm">
        </div>

        {{-- Answer --}}
        <div>
            <label class="block text-sm font-medium">Antwoord</label>
            <textarea name="answer"
                      rows="6"
                      required
                      class="mt-1 w-full rounded-md border px-3 py-2 text-sm">{{ old('answer', $item->answer) }}</textarea>
        </div>

        {{-- Actions --}}
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.faq-items.index') }}"
               class="rounded-md border px-4 py-2 text-sm hover:bg-slate-50">
                Terug
            </a>

            <button type="submit"
                    class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                Wijzigingen opslaan
            </button>
        </div>
    </form>

    {{-- Delete --}}
    <div class="rounded-xl border border-red-200 bg-red-50 p-5">
        <h2 class="font-semibold text-red-800">FAQ item verwijderen</h2>
        <p class="mt-1 text-sm text-red-700">
            Deze actie kan niet ongedaan gemaakt worden.
        </p>

        <form method="POST"
              action="{{ route('admin.faq-items.destroy', $item) }}"
              onsubmit="return confirm('Ben je zeker dat je dit FAQ item wil verwijderen?')"
              class="mt-3">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                Verwijder FAQ item
            </button>
        </form>
    </div>

</div>
@endsection
