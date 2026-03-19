@extends('layouts.app')

@section('title', 'Disciplines')

@section('content')
    <h2>Gestion des disciplines</h2>

    <p>
        <a class="btn" href="{{ route('disciplines.create') }}">Ajouter une discipline</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($disciplines as $discipline)
                <tr>
                    <td>{{ $discipline->DIS_ID }}</td>
                    <td>{{ $discipline->DIS_NOM }}</td>
                    <td>
                        <a href="{{ route('disciplines.edit', $discipline->DIS_ID) }}">Modifier</a>
                        <form action="{{ route('disciplines.destroy', $discipline->DIS_ID) }}" method="POST" class="inline-form" onsubmit="return confirm('Supprimer cette discipline ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Aucune discipline.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
