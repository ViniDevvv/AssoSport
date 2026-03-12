@extends('app')

@section('title', 'Créer un adhérent')

@section('content')
    <h2>Nouvel adhérent</h2>

    <form method="POST" action="{{ route('adherents.store') }}">
        @include('adherents._form', ['adherent' => null])
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
