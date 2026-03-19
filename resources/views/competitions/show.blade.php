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

    @if(session()->has('auth_adherent_id'))
        <div class="mt-3">
            @if($isAlreadyRegistered)
                <p>Vous etes deja inscrit a cette competition.</p>
            @else
                <form method="POST" action="{{ route('inscriptions.store', $competition->COM_ID) }}">
                    @csrf
                    <button type="submit" class="btn">S'inscrire a cette competition</button>
                </form>
            @endif
        </div>
    @endif

    <p class="mt-3">
        <a href="{{ route('competitions.index') }}">Retour a la liste des competitions</a>
    </p>
@endsection
