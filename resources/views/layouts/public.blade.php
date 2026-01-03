<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sportclub' }}</title>
</head>
<body>

<nav style="padding:10px; border-bottom:1px solid #ddd;">
    <a href="{{ url('/') }}">Home</a> |
    <a href="{{ route('news.index') }}">Nieuws</a> |
    <a href="{{ route('faq.index') }}">FAQ</a> |
    <a href="{{ route('contact.create') }}">Contact</a> |

    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('profile.edit') }}">Mijn profiel</a> |

        @if(auth()->user()?->is_admin)
            <a href="{{ route('admin.dashboard') }}">Admin</a> |
        @endif

        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('register') }}">Register</a>
    @endauth
</nav>

<main style="padding: 20px;">
    @yield('content')
</main>

</body>
</html>
