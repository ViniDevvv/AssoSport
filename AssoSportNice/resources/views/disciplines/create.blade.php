@extends('layouts.app')

@section('title', 'Nouvelle discipline')

@section('content')
    <h1>Ajouter une discipline</h1>

    <form action="{{ route('disciplines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="DIS_ID" class="form-label">Code (max 10 caractères)</label>
            <input type="text" name="DIS_ID" id="DIS_ID" class="form-control @error('DIS_ID') is-invalid @enderror" value="{{ old('DIS_ID') }}">
            @error('DIS_ID')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="DIS_NOM" class="form-label">Nom</label>
            <input type="text" name="DIS_NOM" id="DIS_NOM" class="form-control @error('DIS_NOM') is-invalid @enderror" value="{{ old('DIS_NOM') }}">
            @error('DIS_NOM')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('disciplines.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
