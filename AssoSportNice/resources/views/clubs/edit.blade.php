@extends('layouts.app')

@section('title', 'Modifier un club - NiceAssoSport')

@section('content')
    <h2>Modifier le club {{ $club->CLU_NOM }}</h2>

    <form action="{{ route('clubs.update', $club->CLU_ID) }}" method="POST" class="form-grid">
        @csrf
        @method('PUT')

        <label for="CLU_ID">ID Club</label>
        <input type="text" id="CLU_ID" name="CLU_ID" value="{{ $club->CLU_ID }}" disabled>

        <label for="CLU_NOM">Nom</label>
        <input type="text" id="CLU_NOM" name="CLU_NOM" value="{{ old('CLU_NOM', $club->CLU_NOM) }}" required maxlength="50">

        <label for="CLU_ADRESSEVILLE">Ville</label>
        <input type="text" id="CLU_ADRESSEVILLE" name="CLU_ADRESSEVILLE" value="{{ old('CLU_ADRESSEVILLE', $club->CLU_ADRESSEVILLE) }}" maxlength="50">

        <label for="CLU_ADRESSERUE">Rue</label>
        <input type="text" id="CLU_ADRESSERUE" name="CLU_ADRESSERUE" value="{{ old('CLU_ADRESSERUE', $club->CLU_ADRESSERUE) }}" maxlength="25">

        <label for="CLU_ADRESSECP">Code postal</label>
        <input type="text" id="CLU_ADRESSECP" name="CLU_ADRESSECP" value="{{ old('CLU_ADRESSECP', $club->CLU_ADRESSECP) }}" maxlength="6">

        <label for="CLU_MAIL">Mail</label>
        <input type="email" id="CLU_MAIL" name="CLU_MAIL" value="{{ old('CLU_MAIL', $club->CLU_MAIL) }}" maxlength="25">

        <label for="CLU_TELFIXE">Telephone fixe</label>
        <input type="text" id="CLU_TELFIXE" name="CLU_TELFIXE" value="{{ old('CLU_TELFIXE', $club->CLU_TELFIXE) }}" maxlength="15">

        <div class="actions">
            <button type="submit" class="btn">Mettre a jour</button>
            <a href="{{ route('clubs.index') }}">Retour</a>
        </div>
    </form>
@endsection
