@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">FAQ categorieën</h1>
            <p class="text-sm text-slate-600">
                Beheer categorieën waarin FAQ-vragen gegroepeerd worden.
            </p>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('admin.faq-items.index') }}"
               class="rounded-md border px-4 py-2 text-sm hover:bg-slate-50">
                Naar FAQ items
            </a>

            <a href="{{ route('admin.faq-categories.create') }}"
               class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                Nieuwe categorie
            </a>
        </div>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">ID</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Naam</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Aantal items</th>
                    <th class="px-4 py-3 text-right font-medium text-slate-600">Acties</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($categories as $c)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $c->id }}</td>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $c->name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $c->items_count }}</td>

                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.faq-categories.edit', $c) }}"
                                   class="rounded-md border px-3 py-1.5 text-sm hover:bg-slate-100">
                                    Bewerken
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.faq-categories.destroy', $c) }}"
                                      onsubmit="return confirm('Ben je zeker dat je deze categorie wil verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-sm text-red-700 hover:bg-red-100">
                                        Verwijderen
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-slate-600">
                            Er zijn nog geen categorieën.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
