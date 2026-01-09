@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Team aanmaken</h1>
            <p class="text-sm text-slate-600">
                Maak een nieuw team aan en koppel leden.
            </p>
        </div>

        <a href="{{ route('admin.teams.index') }}"
           class="rounded-md border px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
            ← Terug
        </a>
    </div>

    {{-- Errors --}}
    @if($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <form method="POST"
              action="{{ route('admin.teams.store') }}"
              class="space-y-6 px-4 py-5">
            @csrf

            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-700">Naam</label>
                <input
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                >
            </div>

            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-700">Seizoen</label>
                <input
                    name="season"
                    value="{{ old('season') }}"
                    placeholder="2025-2026"
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                >
            </div>

            {{-- Leden --}}
            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-slate-900">Leden</h3>

                <div class="space-y-1">
                    @foreach($users as $u)
                        <label class="flex items-center gap-2 text-sm text-slate-700">
                            <input
                                type="checkbox"
                                name="user_ids[]"
                                value="{{ $u->id }}"
                                {{ in_array($u->id, old('user_ids', [])) ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-0"
                            >
                            {{ $u->name }} ({{ $u->email }})
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
