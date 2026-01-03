@extends('layouts.admin')

@section('content')
    
  <h1>Nieuwe user aanmaken</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('users.store') }}">
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
      <label>Wachtwoord</label><br>
      <input type="password" name="password" required>
    </div>

    <div>
      <label>
        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
        Maak admin
      </label>
    </div>

    <button type="submit">Aanmaken</button>
  </form>

  <p><a href="{{ route('users.index') }}">← Terug</a></p>

@endsection
