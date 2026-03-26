@extends('layouts.app')

@section('title', 'Mes competitions')

@section('content')
    <h2>Gestion des competitions de mon club</h2>

    <p>
        <a class="btn" href="{{ route('admin.competitions.create') }}">Ajouter une competition</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Discipline</th>
                <th>Club local</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($competitions as $competition)
                <tr>
                    <td>{{ $competition->COM_ID }}</td>
                    <td>{{ $competition->COM_NOM }}</td>
                    <td>{{ $competition->COM_DATE ? \Carbon\Carbon::parse($competition->COM_DATE)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $competition->discipline_nom ?? $competition->DIS_ID }}</td>
                    <td>{{ $competition->club_local_nom ?? $competition->CLU_ID_LOCAL }}</td>
                    <td>
                        <a href="{{ route('admin.competitions.edit', $competition->COM_ID) }}">Modifier</a>
                        <form action="{{ route('admin.competitions.destroy', $competition->COM_ID) }}" method="POST" class="inline-form" onsubmit="return confirm('Supprimer cette competition ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucune competition pour votre club.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
