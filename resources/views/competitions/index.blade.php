@extends('layouts.app')

@section('title', 'Gestion des compétitions')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Compétitions</h1>
        <a href="{{ route('competitions.create') }}" class="btn btn-primary">Nouvelle compétition</a>
    </div>

    @if($competitions->isEmpty())
        <p>Aucune compétition enregistrée.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Discipline</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($competitions as $competition)
                    <tr>
                        <td>{{ $competition->COM_ID }}</td>
                        <td>{{ $competition->COM_NOM }}</td>
                        <td>{{ $competition->discipline->DIS_NOM ?? 'N/A' }}</td>
                        <td>{{ $competition->COM_DATE ? $competition->COM_DATE->format('Y-m-d') : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('competitions.edit', $competition) }}" class="btn btn-sm btn-secondary">Modifier</a>
                            <form action="{{ route('competitions.destroy', $competition) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette compétition ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
