@extends('layouts.admin')

@section('content')
    
  <h1>Admin - Teams</h1>

  @if(session('success')) <p>{{ session('success') }}</p> @endif

  <p><a href="{{ route('admin.teams.create') }}">+ Nieuw team</a></p>

  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Seizoen</th>
        <th># Leden</th>
        <th>Acties</th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $t)
        <tr>
          <td>{{ $t->id }}</td>
          <td>{{ $t->name }}</td>
          <td>{{ $t->season }}</td>
          <td>{{ $t->users_count }}</td>
          <td>
            <a href="{{ route('admin.teams.edit', $t) }}">Bewerk</a>

            <form method="POST" action="{{ route('admin.teams.destroy', $t) }}" style="display:inline;">

              @csrf
              @method('DELETE')
              <button type="submit">Verwijder</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
