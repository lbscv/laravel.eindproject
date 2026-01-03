@extends('layouts.admin')

@section('content')
    
  <h1>Team aanmaken</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('admin.teams.store') }}">
    @csrf

    <div>
      <label>Naam</label><br>
      <input name="name" value="{{ old('name') }}" required>
    </div>

    <div>
      <label>Seizoen</label><br>
      <input name="season" value="{{ old('season') }}" placeholder="2025-2026">
    </div>

    <h3>Leden</h3>
    @foreach($users as $u)
      <label style="display:block;">
        <input type="checkbox" name="user_ids[]" value="{{ $u->id }}"
          {{ in_array($u->id, old('user_ids', [])) ? 'checked' : '' }}>
        {{ $u->name }} ({{ $u->email }})
      </label>
    @endforeach

    <button type="submit">Aanmaken</button>
  </form>

  <p><a href="{{ route('admin.teams.index') }}">← Terug</a></p>

@endsection
