<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NiceAssoSport')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="topbar">
    <div class="container topbar-inner">
        <h1 class="brand">NiceAssoSport</h1>
        <nav class="main-nav" aria-label="Navigation principale">
            <a class="nav-link {{ request()->routeIs('clubs.*') ? 'is-active' : '' }}" href="{{ route('clubs.index') }}">Clubs</a>
            <a class="nav-link {{ request()->routeIs('adherents.*') ? 'is-active' : '' }}" href="{{ route('adherents.index') }}">Adherents</a>
            @if(session()->has('auth_adherent_id'))
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link" style="background:none;border:none;cursor:pointer;">Deconnexion</button>
                </form>
            @else
                <a class="nav-link {{ request()->routeIs('login.*') ? 'is-active' : '' }}" href="{{ route('login.form') }}">Connexion</a>
            @endif
        </nav>
    </div>
</header>

<main class="container page-content">
    @if(session('success'))
        <p class="flash-success">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div class="flash-error">
            <strong>Erreurs :</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="container page-footer">
    &copy; 2026 NiceAssoSport - Tous droits reserves
</footer>
</body>
</html>
