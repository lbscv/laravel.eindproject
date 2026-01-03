@extends('layouts.admin')

@section('content')
    
    <h1>Admin - Users</h1>

    @if(session('success')) <p>{{ session('success') }}</p> @endif
    @if(session('error')) <p>{{ session('error') }}</p> @endif

    <p><a href="{{ route('users.create') }}">+ Nieuwe user aanmaken</a></p>

    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Admin?</th>
                <th>Actie</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->is_admin ? 'JA' : 'NEE' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.users.toggleAdmin', $u) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit">
                            {{ $u->is_admin ? 'Maak normaal' : 'Maak admin' }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
