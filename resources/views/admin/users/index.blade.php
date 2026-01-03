@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Gebruikersbeheer</h1>
            <p class="text-sm text-slate-600">
                Beheer gebruikersaccounts en adminrechten. Alleen admins kunnen deze acties uitvoeren.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-black hover:bg-slate-800">
            Nieuwe gebruiker
        </a>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
            {{ session('error') }}
        </div>
    @endif

    {{-- Users table --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">ID</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Naam</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Email</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Rol</th>
                    <th class="px-4 py-3 text-right font-medium text-slate-600">Acties</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($users as $u)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $u->id }}</td>

                        <td class="px-4 py-3 font-medium text-slate-900">
                            {{ $u->name }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $u->email }}
                        </td>

                        <td class="px-4 py-3">
                            @if($u->is_admin)
                                <span class="inline-flex items-center rounded-full bg-slate-900 px-2.5 py-1 text-xs font-medium text-white">
                                    Admin
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-700">
                                    User
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">

                                {{-- Toggle admin --}}
                                <form method="POST"
                                      action="{{ route('admin.users.toggleAdmin', $u) }}"
                                      onsubmit="return confirm('Rechten van deze gebruiker wijzigen?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="rounded-md border px-3 py-1.5 text-sm hover:bg-slate-100">
                                        {{ $u->is_admin ? 'Maak user' : 'Maak admin' }}
                                    </button>
                                </form>

                                {{-- Delete user --}}
                                <form method="POST"
                                      action="{{ route('admin.users.destroy', $u) }}"
                                      onsubmit="return confirm('Deze gebruiker definitief verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-sm text-red-700 hover:bg-red-100">
                                        Verwijder
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-600">
                            Er zijn nog geen gebruikers.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
