@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Nieuwsbeheer</h1>
            <p class="text-slate-600 text-sm">
                Beheer alle nieuwsitems die zichtbaar zijn op de publieke website.
            </p>
        </div>

        <a href="{{ route('admin.news.create') }}"
           class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
            Nieuws aanmaken
        </a>
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
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Titel</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Publicatiedatum</th>
                    <th class="px-4 py-3 text-right font-medium text-slate-600">Acties</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse($news as $n)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $n->id }}</td>

                        <td class="px-4 py-3">
                            <div class="font-medium text-slate-900">
                                {{ $n->title }}
                            </div>
                        </td>

                        <td class="px-4 py-3 text-slate-600">
                            {{ optional($n->published_at)->format('d-m-Y') ?? '—' }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.news.edit', $n) }}"
                                   class="rounded-md border px-3 py-1.5 text-sm hover:bg-slate-100">
                                    Bewerken
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.news.destroy', $n) }}"
                                      onsubmit="return confirm('Ben je zeker dat je dit nieuwsitem wil verwijderen?')">
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
                            Er zijn nog geen nieuwsitems.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div>
        {{ $news->links() }}
    </div>

</div>
@endsection
