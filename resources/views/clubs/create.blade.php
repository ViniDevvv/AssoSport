@extends('layouts.app')

@section('title', 'Ajouter un club - NiceAssoSport')

@section('content')
    <h2>Ajouter un club</h2>

    <form action="{{ route('clubs.store') }}" method="POST" class="form-grid">
        @csrf

        <label for="CLU_NOM">Nom</label>
        <input type="text" id="CLU_NOM" name="CLU_NOM" value="{{ old('CLU_NOM') }}" required maxlength="50">

        <label for="CLU_ADRESSEVILLE">Ville</label>
        <input type="text" id="CLU_ADRESSEVILLE" name="CLU_ADRESSEVILLE" value="{{ old('CLU_ADRESSEVILLE') }}" maxlength="50">

        <label for="CLU_ADRESSERUE">Rue</label>
        <input type="text" id="CLU_ADRESSERUE" name="CLU_ADRESSERUE" value="{{ old('CLU_ADRESSERUE') }}" maxlength="25">

        <label for="CLU_ADRESSECP">Code postal</label>
        <input type="text" id="CLU_ADRESSECP" name="CLU_ADRESSECP" value="{{ old('CLU_ADRESSECP') }}" maxlength="6">

        <label for="CLU_MAIL">Mail</label>
        <input type="email" id="CLU_MAIL" name="CLU_MAIL" value="{{ old('CLU_MAIL') }}" maxlength="25">

        <label for="CLU_TELFIXE">Telephone fixe</label>
        <input type="text" id="CLU_TELFIXE" name="CLU_TELFIXE" value="{{ old('CLU_TELFIXE') }}" maxlength="15">

        <div class="actions">
            <button type="submit" class="btn">Enregistrer</button>
            <a href="{{ route('clubs.index') }}">Annuler</a>
        </div>
    </form>
@endsection
