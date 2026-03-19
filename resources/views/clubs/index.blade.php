@extends('layouts.app')

@section('title', 'Clubs - NiceAssoSport')

@section('content')
    <h2>Gestion des clubs</h2>

    <p>
        <a class="btn" href="{{ route('clubs.create') }}">Ajouter un club</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Ville</th>
                <th>Rue</th>
                <th>CP</th>
                <th>Mail</th>
                <th>Tel</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clubs as $club)
                <tr>
                    <td>{{ $club->CLU_ID }}</td>
                    <td>{{ $club->CLU_NOM }}</td>
                    <td>{{ $club->CLU_ADRESSEVILLE }}</td>
                    <td>{{ $club->CLU_ADRESSERUE }}</td>
                    <td>{{ $club->CLU_ADRESSECP }}</td>
                    <td>{{ $club->CLU_MAIL }}</td>
                    <td>{{ $club->CLU_TELFIXE }}</td>
                    <td>
                        <a href="{{ route('clubs.edit', $club->CLU_ID) }}">Modifier</a>
                        <form action="{{ route('clubs.destroy', $club->CLU_ID) }}" method="POST" class="inline-form" onsubmit="return confirm('Supprimer ce club ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Aucun club trouve.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
