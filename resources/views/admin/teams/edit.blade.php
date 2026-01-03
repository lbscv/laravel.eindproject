@extends('layouts.admin')

@section('content')
   
  <h1>Team bewerken</h1>

  @if(session('success')) <p>{{ session('success') }}</p> @endif

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('admin.teams.update', $team) }}">
    @csrf
    @method('PUT')

    <div>
      <label>Naam</label><br>
      <input name="name" value="{{ old('name', $team->name) }}" required>
    </div>

    <div>
      <label>Seizoen</label><br>
      <input name="season" value="{{ old('season', $team->season) }}">
    </div>

    <h3>Leden</h3>
    @php
      $oldSelected = old('user_ids');
      $checkedIds = is_array($oldSelected) ? $oldSelected : $selected;
    @endphp

    @foreach($users as $u)
      <label style="display:block;">
        <input type="checkbox" name="user_ids[]" value="{{ $u->id }}"
          {{ in_array($u->id, $checkedIds) ? 'checked' : '' }}>
        {{ $u->name }} ({{ $u->email }})
      </label>
    @endforeach

    <button type="submit">Opslaan</button>
  </form>

  <p><a href="{{ route('admin.teams.index') }}">← Terug</a></p>

@endsection
