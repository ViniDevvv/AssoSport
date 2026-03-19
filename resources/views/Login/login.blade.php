@extends('layouts.app')

@section('title', 'Authentification')

@section('content')
    <h2>Connexion</h2>

    <form action="{{ route('login.attempt') }}" method="post" style="max-width: 420px;">
        @csrf

        <div class="form-group">
            <label for="login">E-mail ou identifiant</label>
            <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
@endsection