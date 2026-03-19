@extends('layouts.app')

@section('title', 'Administration')

@section('content')
    <h2>Tableau de bord administrateur</h2>

    <div class="card">
        <p><strong>Clubs :</strong> {{ $stats['clubs'] }}</p>
        <p><strong>Disciplines :</strong> {{ $stats['disciplines'] }}</p>
        <p><strong>Competitions :</strong> {{ $stats['competitions'] }}</p>
        <p><strong>Utilisateurs :</strong> {{ $stats['adherents'] }}</p>
    </div>

    <div class="mt-3">
        <a class="btn" href="{{ route('clubs.index') }}">Gerer les clubs</a>
        <a class="btn" href="{{ route('disciplines.index') }}">Gerer les disciplines</a>
        <a class="btn" href="{{ route('adherents.index') }}">Gerer les utilisateurs</a>
    </div>
@endsection
