@extends('layouts.public')

@section('content')

{{-- HERO --}}
<section style="background:#1e293b; color:white; padding:3rem; border-radius:8px;">
    <h1 style="font-size:2.5rem; font-weight:bold;">Sporthal De Stelplaats</h1>
    <p style="margin-top:1rem; max-width:600px;">
        Een moderne sporthal in het hart van Leuven voor recreatie, clubs en competitie.
        Van zaalvoetbal tot volleybal, iedereen is welkom.
    </p>

    <div style="margin-top:1.5rem;">
        <a href="{{ route('contact.create') }}" style="background:white; color:#1e293b; padding:0.6rem 1rem; border-radius:4px; margin-right:1rem;">
            Contacteer ons
        </a>
        <a href="{{ route('news.index') }}" style="border:1px solid white; padding:0.6rem 1rem; border-radius:4px;">
            Bekijk nieuws
        </a>
    </div>
</section>

{{-- INFO --}}
<section style="margin-top:3rem;">
    <h2>Over de sporthal</h2>
    <p style="max-width:700px;">
        Sporthal De Stelplaats is een polyvalente sportinfrastructuur geïnspireerd op
        de moderne sporthallen van Leuven. We bieden kwalitatieve faciliteiten aan
        sportclubs, scholen en individuele sporters.
    </p>
</section>

{{-- FACILITEITEN --}}
<section style="margin-top:3rem;">
    <h2>Faciliteiten</h2>

    <ul style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem;">
        <li>Multifunctionele sportzaal</li>
        <li>Moderne kleedkamers</li>
        <li>Toegankelijk voor iedereen</li>
        <li>Parking aan de sporthal</li>
        <li>Geschikt voor clubs & competities</li>
        <li>Samenwerking met scholen</li>
    </ul>
</section>

{{-- NIEUWS PREVIEW --}}
<section style="margin-top:3rem;">
    <h2>Laatste nieuws</h2>

    @if($latestNews->isEmpty())
        <p>Er zijn momenteel geen nieuwsberichten.</p>
    @else
        <ul>
            @foreach($latestNews as $news)
                <li style="margin-bottom:0.5rem;">
                    <a href="{{ route('news.show', $news) }}">
                        {{ $news->title }}
                    </a>
                    <small>({{ $news->published_at?->format('d/m/Y') }})</small>
                </li>
            @endforeach
        </ul>
    @endif

    <p style="margin-top:1rem;">
        <a href="{{ route('news.index') }}">→ Alle nieuwsberichten</a>
    </p>
</section>

{{-- CALL TO ACTION --}}
<section style="margin-top:3rem; background:#f1f5f9; padding:2rem; border-radius:8px;">
    <h2>Interesse in onze sporthal?</h2>
    <p>
        Neem contact met ons op voor reservaties, samenwerkingen of algemene vragen.
    </p>
    <a href="{{ route('contact.create') }}" style="margin-top:1rem; display:inline-block; background:#1e293b; color:white; padding:0.6rem 1rem; border-radius:4px;">
        Contactformulier
    </a>
</section>

@endsection
