@extends('layouts.app')

@section('title', 'Gestion des disciplines')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Disciplines</h1>
        <a href="{{ route('disciplines.create') }}" class="btn btn-primary">Nouvelle discipline</a>
    </div>

    @if($disciplines->isEmpty())
        <p>Aucune discipline enregistrée.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplines as $discipline)
                    <tr>
                        <td>{{ $discipline->DIS_ID }}</td>
                        <td>{{ $discipline->name }}</td>
                        <td>
                            <a href="{{ route('disciplines.edit', $discipline) }}" class="btn btn-sm btn-secondary">Modifier</a>
                            <form action="{{ route('disciplines.destroy', $discipline) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette discipline ?');">
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
