@extends('layouts.app')

@section('title', 'Modifier discipline')

@section('content')
    <h1>Modifier la discipline &laquo;{{ $discipline->name }}&raquo;</h1>

    <form action="{{ route('disciplines.update', $discipline) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="DIS_ID" class="form-label">Code</label>
            <input type="text" id="DIS_ID" class="form-control" value="{{ $discipline->DIS_ID }}" disabled>
        </div>
        <div class="mb-3">
            <label for="DIS_NOM" class="form-label">Nom</label>
            <input type="text" name="DIS_NOM" id="DIS_NOM" class="form-control @error('DIS_NOM') is-invalid @enderror" value="{{ old('DIS_NOM', $discipline->name) }}">
            @error('DIS_NOM')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('disciplines.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
