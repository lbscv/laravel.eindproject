<h1>Contact</h1>

@if(session('success'))
  <p>{{ session('success') }}</p>
@endif

@if($errors->any())
  <ul>
    @foreach($errors->all() as $e)
      <li>{{ $e }}</li>
    @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('contact.store') }}">
  @csrf

  <div>
    <label>Naam</label><br>
    <input name="name" value="{{ old('name') }}" required>
  </div>

  <div>
    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required>
  </div>

  <div>
    <label>Onderwerp</label><br>
    <input name="subject" value="{{ old('subject') }}" required>
  </div>

  <div>
    <label>Bericht</label><br>
    <textarea name="message" rows="6" required>{{ old('message') }}</textarea>
  </div>

  <button type="submit">Verstuur</button>
</form>
