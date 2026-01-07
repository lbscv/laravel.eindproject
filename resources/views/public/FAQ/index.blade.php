@extends('layouts.public')

@section('content')

    <div class="flex flex-col gap-6 max-w-5xl mx-auto">
        <div class="flex justify-end">
            <button id="filter-toggle-btn" class="inline-flex items-center gap-2 rounded-lg bg-cyan-600 px-4 py-2 text-sm font-semibold text-slate-900 shadow-md transition hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-200 focus:ring-offset-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span id="filter-toggle-text">Filters tonen</span>
            </button>
        </div>

        <div id="filter-panel" class="@if(!($filters['q'] ?? '') && !($filters['from'] ?? '') && !($filters['to'] ?? '') && !($filters['category'] ?? '')) hidden @endif rounded-2xl border border-slate-200 bg-white/90 px-6 py-5 md:px-7 md:py-6 shadow-lg shadow-cyan-500/5 backdrop-blur">
            <form id="faq-filter-form" method="GET" class="grid gap-4 md:grid-cols-12 md:items-end">
                <div class="md:col-span-5">
                    <label class="block text-sm font-semibold text-slate-800 mb-1">Zoeken</label>
                    <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Zoek in vragen of antwoorden" class="w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm shadow-sm focus:border-cyan-600 focus:ring-2 focus:ring-cyan-100" />
                </div>
                <div class="md:col-span-3">
                    <label class="block text-sm font-semibold text-slate-800 mb-1">Categorie</label>
                    <select name="category" class="w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm shadow-sm focus:border-cyan-600 focus:ring-2 focus:ring-cyan-100">
                        <option value="">Alle categorieën</option>
                        @foreach($allCategories as $cat)
                            <option value="{{ $cat->id }}" @selected(($filters['category'] ?? '') == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-800 mb-1">Vanaf datum</label>
                    <input type="date" name="from" value="{{ $filters['from'] ?? '' }}" class="w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm shadow-sm focus:border-cyan-600 focus:ring-2 focus:ring-cyan-100" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-800 mb-1">Tot datum</label>
                    <input type="date" name="to" value="{{ $filters['to'] ?? '' }}" class="w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm shadow-sm focus:border-cyan-600 focus:ring-2 focus:ring-cyan-100" />
                </div>
                <div class="md:col-span-12 flex flex-wrap justify-start md:justify-end gap-3">
                    <button class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-bold text-cyan-700 border border-cyan-700 shadow-md shadow-cyan-500/15 transition hover:bg-cyan-50 focus:outline-none focus:ring-2 focus:ring-cyan-200 focus:ring-offset-1" type="submit">
                        Filter toepassen
                    </button>
                    <a class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-800 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-cyan-200 focus:ring-offset-1" href="{{ route('faq.index') }}">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <div id="faq-list" class="flex flex-col gap-6">
            @forelse($categories as $cat)
                <div class="space-y-3">
                    <h2 class="text-xl font-semibold text-ink-900">{{ $cat->name }}</h2>

                    @if($cat->items->isEmpty())
                        <p class="text-ink-600">Geen vragen in deze categorie{{ $filters['q'] || $filters['from'] || $filters['to'] || $filters['category'] ? ' met deze filters' : '' }}.</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($cat->items as $item)
                                <li class="card p-4">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <strong class="block text-ink-900">{{ $item->question }}</strong>
                                            <span class="text-ink-700 block mt-1">
                                                {!! nl2br(e($item->answer)) !!}
                                            </span>
                                        </div>
                                        <div class="text-xs text-ink-500 whitespace-nowrap">{{ $item->created_at->format('d-m-Y') }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @empty
                <p class="text-ink-600">Nog geen FAQ categorieën.</p>
            @endforelse
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Filter toggle functionality
    const toggleBtn = document.getElementById('filter-toggle-btn');
    const toggleText = document.getElementById('filter-toggle-text');
    const filterPanel = document.getElementById('filter-panel');
    
    if (toggleBtn && filterPanel && toggleText) {
        // Set initial button text based on panel visibility
        if (!filterPanel.classList.contains('hidden')) {
            toggleText.textContent = 'Filters verbergen';
        }
        
        toggleBtn.addEventListener('click', () => {
            const isHidden = filterPanel.classList.contains('hidden');
            if (isHidden) {
                filterPanel.classList.remove('hidden');
                toggleText.textContent = 'Filters verbergen';
            } else {
                filterPanel.classList.add('hidden');
                toggleText.textContent = 'Filters tonen';
            }
        });
    }

    // Filter submit functionality
    const form = document.getElementById('faq-filter-form');
    const list = document.getElementById('faq-list');
    if (!form || !list) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const url = new URL(form.action || window.location.href);
        const formData = new FormData(form);
        for (const [key, value] of formData.entries()) {
            if (value) {
                url.searchParams.set(key, value);
            } else {
                url.searchParams.delete(key);
            }
        }

        const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        if (!res.ok) {
            form.submit();
            return;
        }
        const html = await res.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newList = doc.getElementById('faq-list');
        if (newList) {
            list.innerHTML = newList.innerHTML;
        } else {
            form.submit();
        }
        history.replaceState({}, '', url);
    });
});
</script>

@endsection
