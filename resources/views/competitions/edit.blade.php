@extends('layouts.app')

@section('title', 'Modifier compétition')

@section('content')
    <h1>Modifier la compétition &laquo;{{ $competition->COM_NOM }}&raquo;</h1>

    <form action="{{ route('competitions.update', $competition) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="COM_ID" class="form-label">ID</label>
            <input type="text" id="COM_ID" class="form-control" value="{{ $competition->COM_ID }}" disabled>
        </div>

        <div class="mb-3">
            <label for="COM_NOM" class="form-label">Nom</label>
            <input type="text" name="COM_NOM" id="COM_NOM" class="form-control @error('COM_NOM') is-invalid @enderror" value="{{ old('COM_NOM', $competition->COM_NOM) }}">
            @error('COM_NOM')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="COM_DATE" class="form-label">Date</label>
            <input type="date" name="COM_DATE" id="COM_DATE" class="form-control @error('COM_DATE') is-invalid @enderror" value="{{ old('COM_DATE', $competition->COM_DATE?->format('Y-m-d')) }}">
            @error('COM_DATE')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="DIS_ID" class="form-label">Discipline</label>
            <select name="DIS_ID" id="DIS_ID" class="form-control @error('DIS_ID') is-invalid @enderror">
                <option value="">-- Choisir --</option>
                @foreach($disciplines as $discipline)
                    <option value="{{ $discipline->DIS_ID }}" {{ old('DIS_ID', $competition->DIS_ID) == $discipline->DIS_ID ? 'selected' : '' }}>{{ $discipline->DIS_NOM }}</option>
                @endforeach
            </select>
            @error('DIS_ID')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('competitions.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
