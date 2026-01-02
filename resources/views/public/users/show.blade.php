<h1>Profiel</h1>

<p><strong>Naam:</strong> {{ $user->username ?? $user->name }}</p>

@if($user->birthday)
  <p><strong>Verjaardag:</strong> {{ $user->birthday->format('d-m-Y') }}</p>
@endif

@if($user->avatar)
  <img src="{{ asset('storage/'.$user->avatar) }}" style="max-width:200px;">
@endif

@if($user->about_me)
  <p><strong>Over mij:</strong><br>{!! nl2br(e($user->about_me)) !!}</p>
@endif
