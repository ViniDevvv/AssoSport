@extends('layouts.app')

@section('title', 'Nouvelle compétition')

@section('content')
    <h1>Ajouter une compétition</h1>

    <form action="{{ route('competitions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="COM_ID" class="form-label">Code (max 10 caractères)</label>
            <input type="text" name="COM_ID" id="COM_ID" class="form-control @error('COM_ID') is-invalid @enderror" value="{{ old('COM_ID') }}">
            @error('COM_ID')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="COM_NOM" class="form-label">Nom</label>
            <input type="text" name="COM_NOM" id="COM_NOM" class="form-control @error('COM_NOM') is-invalid @enderror" value="{{ old('COM_NOM') }}">
            @error('COM_NOM')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="COM_DATE" class="form-label">Date</label>
            <input type="date" name="COM_DATE" id="COM_DATE" class="form-control @error('COM_DATE') is-invalid @enderror" value="{{ old('COM_DATE') }}">
            @error('COM_DATE')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="DIS_ID" class="form-label">Discipline</label>
            <select name="DIS_ID" id="DIS_ID" class="form-control @error('DIS_ID') is-invalid @enderror">
                <option value="">-- Choisir --</option>
                @foreach($disciplines as $discipline)
                    <option value="{{ $discipline->DIS_ID }}" {{ old('DIS_ID') == $discipline->DIS_ID ? 'selected' : '' }}>{{ $discipline->DIS_NOM }}</option>
                @endforeach
            </select>
            @error('DIS_ID')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('competitions.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
