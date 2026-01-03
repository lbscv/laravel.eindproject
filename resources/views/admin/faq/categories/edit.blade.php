@extends('layouts.admin')

@section('content')
<div class="max-w-xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">FAQ categorie bewerken</h1>
        <p class="text-sm text-slate-600">
            Pas de naam van deze FAQ categorie aan.
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
          action="{{ route('admin.faq-categories.update', $category) }}"
          class="space-y-5 rounded-xl border bg-white p-6 shadow-sm">

        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Naam</label>
            <input type="text"
                   name="name"
                   value="{{ old('name', $category->name) }}"
                   required
                   class="mt-1 w-full rounded-md border px-3 py-2 text-sm">
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.faq-categories.index') }}"
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
        <h2 class="font-semibold text-red-800">Categorie verwijderen</h2>
        <p class="mt-1 text-sm text-red-700">
            Deze actie kan niet ongedaan gemaakt worden.
        </p>

        <form method="POST"
              action="{{ route('admin.faq-categories.destroy', $category) }}"
              onsubmit="return confirm('Ben je zeker dat je deze categorie wil verwijderen?')"
              class="mt-3">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                Verwijder categorie
            </button>
        </form>
    </div>

</div>
@endsection
