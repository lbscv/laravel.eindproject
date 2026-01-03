@extends('layouts.admin')

@section('content')
<h1>Admin - Nieuws</h1>

@if(session('success')) <p>{{ session('success') }}</p> @endif

<p><a href="{{ route('admin.news.create') }}">+ Nieuws aanmaken</a></p>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th><th>Titel</th><th>Datum</th><th>Acties</th>
    </tr>
    @foreach($news as $n)
        <tr>
            <td>{{ $n->id }}</td>
            <td>{{ $n->title }}</td>
            <td>{{ optional($n->published_at)->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('admin.news.edit', $n) }}">Bewerk</a>
                <form method="POST" action="{{ route('admin.news.destroy', $n) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijder</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div style="margin-top:10px;">
    {{ $news->links() }}
</div>
@endsection
