@extends('layouts.admin')

@section('content')
<div class="max-w-xl space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">FAQ categorie aanmaken</h1>
        <p class="text-sm text-slate-600">
            Maak een nieuwe categorie aan om FAQ-vragen logisch te groeperen.
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
          action="{{ route('admin.faq-categories.store') }}"
          class="space-y-5 rounded-xl border bg-white p-6 shadow-sm">

        @csrf

        <div>
            <label class="block text-sm font-medium">Naam</label>
            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   class="mt-1 w-full rounded-md border px-3 py-2 text-sm">
        </div>

        {{-- Actions --}}
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.faq-categories.index') }}"
               class="rounded-md border px-4 py-2 text-sm hover:bg-slate-50">
                Terug
            </a>

            <button type="submit"
                    class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                Categorie aanmaken
            </button>
        </div>
    </form>

</div>
@endsection
