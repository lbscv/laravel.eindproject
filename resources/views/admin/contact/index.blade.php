@extends('layouts.admin')

@section('content')
    <h1>Contactberichten</h1>

    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th><th>Naam</th><th>Email</th><th>Onderwerp</th><th>Datum</th><th>Status</th><th></th>
        </tr>
        @foreach($messages as $m)
            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->email }}</td>
                <td>{{ $m->subject ?? '-' }}</td>
                <td>{{ $m->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $m->answered_at ? 'Beantwoord' : 'Nieuw' }}</td>
                <td><a href="{{ route('admin.contact-messages.show', $m) }}">Open</a></td>
            </tr>
        @endforeach
    </table>

    <div style="margin-top:10px;">
        {{ $messages->links() }}
    </div>
@endsection
