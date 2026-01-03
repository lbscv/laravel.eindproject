<h2>Nieuw contactbericht</h2>

<p><strong>Naam:</strong> {{ $contactMessage->name }}</p>
<p><strong>Email:</strong> {{ $contactMessage->email }}</p>
<p><strong>Onderwerp:</strong> {{ $contactMessage->subject ?? '-' }}</p>

<hr>

<p>{!! nl2br(e($contactMessage->message)) !!}</p>

<hr>

<p>
    Admin panel: <a href="{{ route('admin.contact-messages.show', $contactMessage) }}">
        Bekijk bericht #{{ $contactMessage->id }}
    </a>
</p>
