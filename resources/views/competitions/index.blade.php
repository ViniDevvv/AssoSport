@extends('layouts.app')

@section('title', 'Competitions publiques')

@section('content')
    <h2>Competitions publiques</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Discipline</th>
                <th>Club organisateur</th>
                <th>Lieu (club local)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($competitions as $competition)
                <tr>
                    <td>{{ $competition->COM_ID }}</td>
                    <td>{{ $competition->COM_NOM }}</td>
                    <td>{{ optional($competition->COM_DATE)->format('d/m/Y') }}</td>
                    <td>{{ $competition->DIS_ID }}</td>
                    <td>{{ $competition->club_organisateur_nom ?? $competition->CLU_ID }}</td>
                    <td>{{ $competition->club_local_nom ?? $competition->CLU_ID_LOCAL }}</td>
                    <td>
                        <a href="{{ route('competitions.show', $competition->COM_ID) }}">Voir detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Aucune competition publique disponible.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
