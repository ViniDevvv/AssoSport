@extends('app')

@section('title', 'Adhérents')

@section('content')
    <h2>Adhérents</h2>

    <p><a href="{{ route('adherents.create') }}" class="btn btn-success">Créer un adhérent</a></p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Club</th>
                <th>Discipline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adherents as $adherent)
                <tr>
                    <td>{{ $adherent->ADH_ID }}</td>
                    <td>{{ $adherent->ADH_NOM }}</td>
                    <td>{{ $adherent->ADH_PRENOM }}</td>
                    <td>{{ $adherent->CLU_ID }}</td>
                    <td>{{ $adherent->DIS_ID }}</td>
                    <td>
                        <a href="{{ route('adherents.edit', $adherent) }}" class="btn btn-sm btn-primary">Modifier</a>
                        <form action="{{ route('adherents.destroy', $adherent) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet adhérent ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $adherents->links() }}
@endsection
