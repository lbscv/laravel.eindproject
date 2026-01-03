<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin - Sportclub' }}</title>
</head>
<body>

<nav style="padding:10px; border-bottom:1px solid #ddd;">
    <strong>Admin</strong> |
    <a href="{{ route('news.index') }}">Publiek: Nieuws</a> |
    <a href="{{ route('faq.index') }}">Publiek: FAQ</a> |
    <a href="{{ route('contact.create') }}">Publiek: Contact</a> |
    <a href="{{ route('admin.dashboard') }}">Admin home</a> |
    <a href="{{ route('teams.index') }}">Teams</a> |
    <a href="{{ route('faq-categories.index') }}">FAQ categorieën</a> |
    <a href="{{ route('faq-items.index') }}">FAQ items</a> |
    <a href="{{ route('users.index') }}">Users</a> |
    <a href="{{ route('news.create') }}">Nieuws aanmaken</a> |

    <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left:10px;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>

<main style="padding: 20px;">
    @yield('content')
</main>

</body>
</html>
