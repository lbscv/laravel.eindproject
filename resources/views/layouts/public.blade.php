<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sportclub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
    <nav class="p-4 bg-white border-b">
        <div class="max-w-6xl mx-auto flex items-center gap-4">
            <a href="{{ url('/') }}" class="font-bold">Sportclub</a>

            <a href="{{ route('news.index') }}">Nieuws</a>
            <a href="{{ route('faq.index') }}">FAQ</a>
            <a href="{{ route('contact.create') }}">Contact</a>

            <div class="ml-auto flex items-center gap-3">
                @auth
                    <a href="{{ route('users.show', auth()->user()) }}">Mijn profiel</a>

                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
