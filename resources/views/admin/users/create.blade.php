@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Nieuwe user aanmaken</h1>
            <p class="text-sm text-slate-600">
                Voeg een nieuwe gebruiker toe. Alleen admins kunnen gebruikers aanmaken.
            </p>
        </div>

        <a href="{{ route('admin.users.index') }}"
           class="rounded-md border px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
            ← Terug
        </a>
    </div>

    {{-- Errors --}}
    @if($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
            <ul class="list-disc space-y-1 pl-5">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <form method="POST"
              action="{{ route('admin.users.store') }}"
              class="space-y-5 px-4 py-5">
            @csrf

            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-700">Naam</label>
                <input
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-0"
                >
            </div>

            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-700">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-0"
                >
            </div>

            <div class="space-y-1">
                <label class="text-sm font-medium text-slate-700">Wachtwoord</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-0"
                >
            </div>

            <div class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="is_admin"
                    value="1"
                    {{ old('is_admin') ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-0"
                >
                <span class="text-sm text-slate-700">Maak admin</span>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-black hover:bg-slate-800">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
