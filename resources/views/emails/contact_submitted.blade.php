<p><strong>Naam:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Onderwerp:</strong> {{ $data['subject'] }}</p>

<p><strong>Bericht:</strong></p>
<p>{!! nl2br(e($data['message'])) !!}</p>
