@extends('layouts.app')

@section('title', 'Modifier un adhérent')

@section('content')
    <h2>Modifier adhérent</h2>

    <form method="POST" action="{{ route('adherents.update', $adherent) }}">
        @method('PUT')
        @include('adherents._form', ['adherent' => $adherent])
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection