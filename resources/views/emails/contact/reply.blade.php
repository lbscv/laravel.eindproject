<p>Hallo {{ $contactMessage->name }},</p>

<p>Bedankt voor je bericht. Hier is ons antwoord:</p>

<hr>

<p>{!! nl2br(e($replyText)) !!}</p>

<hr>

<p>Met sportieve groeten,<br>De sportclub</p>
