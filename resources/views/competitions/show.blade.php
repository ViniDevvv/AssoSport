@extends('layouts.app')

@section('title', 'Detail competition')

@section('content')
    <h2>Detail competition</h2>

    <div class="card">
        <p><strong>ID :</strong> {{ $competition->COM_ID }}</p>
        <p><strong>Nom :</strong> {{ $competition->COM_NOM }}</p>
        <p><strong>Date :</strong> {{ optional($competition->COM_DATE)->format('d/m/Y') }}</p>
        <p><strong>Discipline :</strong> {{ $competition->DIS_ID }}</p>
        <p><strong>Club organisateur :</strong> {{ $competition->club_organisateur_nom ?? $competition->CLU_ID }}</p>
        <p><strong>Club local :</strong> {{ $competition->club_local_nom ?? $competition->CLU_ID_LOCAL }}</p>
    </div>

    <p class="mt-3">
        <a href="{{ route('competitions.index') }}">Retour a la liste des competitions</a>
    </p>
@endsection
