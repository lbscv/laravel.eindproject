@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold">FAQ items</h1>
            <p class="text-sm text-slate-600">
                Beheer de vragen en antwoorden die zichtbaar zijn op de FAQ-pagina.
            </p>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('admin.faq-categories.index') }}"
               class="rounded-md border px-4 py-2 text-sm hover:bg-slate-50">
                Categorieën
            </a>

            <a href="{{ route('admin.faq-items.create') }}"
               class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                Nieuw item
            </a>
        </div>
    </div>

    {{-- Success --}}
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
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Categorie</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Vraag</th>
                    <th class="px-4 py-3 text-right font-medium text-slate-600">Acties</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($items as $i)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $i->id }}</td>
                        <td class="px-4 py-3 text-slate-700">
                            {{ $i->category?->name ?? '—' }}
                        </td>
                        <td class="px-4 py-3 font-medium text-slate-900">
                            {{ $i->question }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.faq-items.edit', $i) }}"
                                   class="rounded-md border px-3 py-1.5 text-sm hover:bg-slate-100">
                                    Bewerken
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.faq-items.destroy', $i) }}"
                                      onsubmit="return confirm('Ben je zeker dat je dit FAQ item wil verwijderen?')">
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
                            Er zijn nog geen FAQ items.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
