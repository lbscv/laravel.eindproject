@extends('layouts.public')

@section('content')
    <h1>Profiel van {{ $user->username ?? $user->name }}</h1>

    @if($user->avatar)
        <img src="{{ asset('storage/'.$user->avatar) }}" style="max-width:150px;">
    @endif

    <p><strong>Username:</strong> {{ $user->username ?? '-' }}</p>
    <p><strong>Verjaardag:</strong> {{ $user->birthday?->format('d-m-Y') ?? '-' }}</p>

    <h3>Over mij</h3>
    <p>{!! nl2br(e($user->about_me ?? '')) !!}</p>
@endsection
