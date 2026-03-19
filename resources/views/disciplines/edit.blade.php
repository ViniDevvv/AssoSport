@extends('layouts.app')

@section('title', 'Modifier discipline')

@section('content')
    <h2>Modifier discipline</h2>

    <form method="POST" action="{{ route('disciplines.update', $discipline->DIS_ID) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="DIS_ID">ID discipline</label>
            <input type="text" id="DIS_ID" name="DIS_ID" value="{{ old('DIS_ID', $discipline->DIS_ID) }}" required>
        </div>

        <div class="form-group">
            <label for="DIS_NOM">Nom</label>
            <input type="text" id="DIS_NOM" name="DIS_NOM" value="{{ old('DIS_NOM', $discipline->DIS_NOM) }}" required>
        </div>

        <button type="submit" class="btn">Mettre a jour</button>
    </form>
@endsection
