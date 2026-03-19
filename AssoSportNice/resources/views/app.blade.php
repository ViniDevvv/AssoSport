<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NiceAssoSport')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        header { background: #2c3e50; color: white; padding: 15px 20px; }
        header h1 { margin: 0; font-size: 24px; }
        nav { background: #34495e; }
        nav ul { margin: 0; padding: 0; list-style: none; display: flex; }
        nav ul li { margin: 0; }
        nav ul li a { display: block; padding: 12px 20px; color: white; text-decoration: none; }
        nav ul li a:hover { background: #1abc9c; }
        main { padding: 20px; }
        footer { text-align: center; padding: 15px; background: #2c3e50; color: white; font-size: 12px; }
        .rgpd { margin-top: 5px; font-size: 11px; color: #ccc; }
    </style>
</head>
<body>

<header>
    <h1>NiceAssoSport</h1>
</header>

<nav>
    <ul>
        <li><a href="{{ route('adherents.index') }}">Adhérents</a></li>
    </ul>
</nav>

<main>
    
    @yield('content')       <!-- ici sera insérée la section content -->
</main>

<footer>
    &copy; 2026 NiceAssoSport - Tous droits réservés
    <div class="rgpd">
         Conformément au RGPD, vos données personnelles sont utilisées uniquement pour la gestion des inscriptions et compétitions sportives. (A COMPLKETER)
        <a href="{{ route('rgpd') }}" style="color: #1abc9c;">En savoir plus</a>
    </div>
</footer> </body> </html>