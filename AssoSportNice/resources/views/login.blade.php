<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Authentification')</title>
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
    <header>
        <h1>Authentification</h1>
    </header>

    <form>
        <div class="form-group">
            <!--Champs de texte nom utilisateur -->
            <label>E-mail : </label>
            <input type="email" class="form-control" id="email" name="name" />
        </div>
        <div class="form-group">
            <!--Champs de texte mot de passe -->
            <label>Mot de passe : </label>
            <input type="password" class="form-control" id="mdp" name="mdp" />
        </div>
        <button type="Submit" class="btn btn-outline-primary btn-lg">Submit</button>
    </form>
</body>
</html>