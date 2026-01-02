<h2>Nieuw contactbericht</h2>

<p><strong>Naam:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Onderwerp:</strong> {{ $contact->subject }}</p>

<hr>

<p>{!! nl2br(e($contact->message)) !!}</p>
