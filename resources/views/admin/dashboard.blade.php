@extends('layouts.admin')

@section('content')
<div class="space-y-8">

    <div>
        <h1 class="text-2xl font-bold">Admin dashboard</h1>
        <p class="mt-1 text-slate-600">
            Welkom in het beheer van <strong>Sporthal De Stelplaats</strong>.
            Hier kan je content beheren (nieuws, FAQ), gebruikersrechten aanpassen en contactberichten opvolgen.
        </p>
    </div>
    </br>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        <div class="rounded-xl border bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold">Nieuws beheren</h2>
            <p class="mt-2 text-sm text-slate-600">
                Voeg nieuwsitems toe met titel, tekst, publicatiedatum en optioneel een afbeelding.
                Bezoekers zien deze in het publieke nieuws-overzicht.
            </p>

            <div class="mt-4 flex flex-wrap gap-2">
                <a class="rounded bg-slate-900 px-3 py-2 text-sm text-white hover:bg-slate-800"
                   href="{{ route('admin.news.create') }}">
                    Nieuws aanmaken
                </a>
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('admin.news.index') }}">
                    Nieuwsbeheer
                </a>
            </div>
        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold">FAQ beheren</h2>
            <p class="mt-2 text-sm text-slate-600">
                Beheer FAQ categorieën en vragen/antwoorden. De FAQ pagina is publiek zichtbaar en helpt bezoekers snel
                informatie vinden.
            </p>

            <div class="mt-4 flex flex-wrap gap-2">
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('admin.faq-categories.index') }}">
                    Categorieën beheren
                </a>
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('admin.faq-items.index') }}">
                    Items beheren
                </a>
            </div>
        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold">Gebruikers beheren</h2>
            <p class="mt-2 text-sm text-slate-600">
                Bekijk alle gebruikers, maak manueel nieuwe accounts aan en geef/haal adminrechten weg
                (zoals vereist in de opdracht).
            </p>

            <div class="mt-4 flex flex-wrap gap-2">
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('admin.users.index') }}">
                    Gebruikers overzicht
                </a>
                <a class="rounded bg-slate-900 px-3 py-2 text-sm text-white hover:bg-slate-800"
                   href="{{ route('admin.users.create') }}">
                    Gebruiker aanmaken
                </a>
            </div>
        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold">Teams beheren</h2>
            <p class="mt-2 text-sm text-slate-600">
                Maak teams aan (bv. Jeugd, Dames, Heren), beheer seizoenen en koppel leden.
                Dit is een logische feature voor een sportclub.
            </p>

            <div class="mt-4 flex flex-wrap gap-2">
                <a class="rounded bg-slate-900 px-3 py-2 text-sm text-white hover:bg-slate-800"
                   href="{{ route('admin.teams.create') }}">
                    Team aanmaken
                </a>
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('admin.teams.index') }}">
                    Teamsbeheer
                </a>
            </div>
        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold">Contactberichten</h2>
            <p class="mt-2 text-sm text-slate-600">
                Bezoekers kunnen het contactformulier invullen. Hier kan je alle berichten bekijken en antwoorden via mail.
            </p>

            <div class="mt-4 flex flex-wrap gap-2">
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('admin.contact-messages.index') }}">
                    Berichten overzicht
                </a>
            </div>
        </div>

        <div class="rounded-xl border bg-white p-5 shadow-sm">
            <h2 class="text-lg font-semibold">Publieke website testen</h2>
            <p class="mt-2 text-sm text-slate-600">
                Controleer hoe bezoekers de site zien. Handig om te testen of nieuws, FAQ en contact correct werken.
            </p>

            <div class="mt-4 flex flex-wrap gap-2">
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('home') }}">
                    Home
                </a>
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('news.index') }}">
                    Nieuws
                </a>
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('faq.index') }}">
                    FAQ
                </a>
                <a class="rounded border px-3 py-2 text-sm hover:bg-slate-50"
                   href="{{ route('contact.create') }}">
                    Contact
                </a>
            </div>
        </div>

    </div>
    </br>
    <div class="rounded-xl border bg-slate-50 p-5 text-sm text-slate-700">
        <strong>Tip voor je screencast:</strong>
        start op dit dashboard, maak een nieuwsitem aan, toon het op de publieke nieuwspagina, toon daarna FAQ beheer
        (categorie + item), en sluit af met een contactbericht dat je in het admin-panel kan beantwoorden.
    </div>

</div>
@endsection
