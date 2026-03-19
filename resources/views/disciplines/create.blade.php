@extends('layouts.app')

@section('title', 'Ajouter discipline')

@section('content')
    <h2>Ajouter une discipline</h2>

    <form method="POST" action="{{ route('disciplines.store') }}">
        @csrf

        <div class="form-group">
            <label for="DIS_ID">ID discipline</label>
            <input type="text" id="DIS_ID" name="DIS_ID" value="{{ old('DIS_ID') }}" required>
        </div>

        <div class="form-group">
            <label for="DIS_NOM">Nom</label>
            <input type="text" id="DIS_NOM" name="DIS_NOM" value="{{ old('DIS_NOM') }}" required>
        </div>

        <button type="submit" class="btn">Creer</button>
    </form>
@endsection
