@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">Admin - Teams</h1>
            <p class="text-sm text-slate-600">
                Beheer teams, seizoenen en gekoppelde leden.
            </p>
        </div>

        <a href="{{ route('admin.teams.create') }}"
           class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-black hover:bg-slate-800">
            + Nieuw team
        </a>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Teams table --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">ID</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Naam</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Seizoen</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600"># Leden</th>
                    <th class="px-4 py-3 text-right font-medium text-slate-600">Acties</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @foreach($teams as $t)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">
                            {{ $t->id }}
                        </td>

                        <td class="px-4 py-3 font-medium text-slate-900">
                            {{ $t->name }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $t->season }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $t->users_count }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.teams.edit', $t) }}"
                                   class="rounded-md border px-3 py-1.5 text-sm hover:bg-slate-100">
                                    Bewerk
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.teams.destroy', $t) }}"
                                      class="inline"
                                      onsubmit="return confirm('Dit team definitief verwijderen?')">
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
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
