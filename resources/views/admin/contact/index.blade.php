@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold">Contactberichten</h1>
        <p class="text-sm text-slate-600">
            Overzicht van alle ingezonden contactformulieren.
        </p>
    </div>

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">ID</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Naam</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Email</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Onderwerp</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Datum</th>
                    <th class="px-4 py-3 text-left font-medium text-slate-600">Status</th>
                    <th class="px-4 py-3 text-right font-medium text-slate-600"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @foreach($messages as $m)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $m->id }}</td>

                        <td class="px-4 py-3 font-medium text-slate-900">
                            {{ $m->name }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $m->email }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $m->subject ?? '-' }}
                        </td>

                        <td class="px-4 py-3 text-slate-700">
                            {{ $m->created_at->format('d-m-Y H:i') }}
                        </td>

                        <td class="px-4 py-3">
                            @if($m->answered_at)
                                <span class="inline-flex items-center rounded-full bg-slate-900 px-2.5 py-1 text-xs font-medium text-white">
                                    Beantwoord
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-700">
                                    Nieuw
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.contact-messages.show', $m) }}"
                               class="rounded-md border px-3 py-1.5 text-sm hover:bg-slate-100">
                                Open
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div>
        {{ $messages->links() }}
    </div>

</div>
@endsection
