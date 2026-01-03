<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin — Sporthal De Stelplaats</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <header class="bg-white border-b">
        <div class="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
            <div class="font-bold">Admin panel</div>

            <nav class="flex items-center gap-3 text-sm">
                <a class="hover:underline" href="{{ route('home') }}">Publiek</a>
                <a class="hover:underline" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="hover:underline" href="{{ route('admin.news.index') }}">Nieuws</a>
                <a class="hover:underline" href="{{ route('admin.faq-categories.index') }}">FAQ cats</a>
                <a class="hover:underline" href="{{ route('admin.faq-items.index') }}">FAQ items</a>
                <a class="hover:underline" href="{{ route('admin.users.index') }}">Users</a>
                <a class="hover:underline" href="{{ route('admin.teams.index') }}">Teams</a>
                <a class="hover:underline" href="{{ route('admin.contact-messages.index') }}">Contact</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded bg-slate-900 text-white px-3 py-1 hover:bg-slate-800" type="submit">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8">
        @if(session('success'))
            <div class="mb-6 rounded border border-green-200 bg-green-50 px-4 py-3 text-green-900">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
