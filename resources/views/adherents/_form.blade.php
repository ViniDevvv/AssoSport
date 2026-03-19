@csrf

<div class="form-group">
    <label for="ADH_ID">ID adhérent</label>
    <input type="text" class="form-control" id="ADH_ID" name="ADH_ID" value="{{ old('ADH_ID', $adherent->ADH_ID ?? '') }}" {{ isset($adherent) ? 'readonly' : 'required' }}">
</div>

<div class="form-group">
    <label for="CLU_ID">Club</label>
    <input type="text" class="form-control" id="CLU_ID" name="CLU_ID" value="{{ old('CLU_ID', $adherent->CLU_ID ?? '') }}" required>
</div>

<div class="form-group">
    <label for="DIS_ID">Discipline</label>
    <input type="text" class="form-control" id="DIS_ID" name="DIS_ID" value="{{ old('DIS_ID', $adherent->DIS_ID ?? '') }}" required>
</div>

<div class="form-group">
    <label for="ADH_NOM">Nom</label>
    <input type="text" class="form-control" id="ADH_NOM" name="ADH_NOM" value="{{ old('ADH_NOM', $adherent->ADH_NOM ?? '') }}" required>
</div>

<div class="form-group">
    <label for="ADH_PRENOM">Prénom</label>
    <input type="text" class="form-control" id="ADH_PRENOM" name="ADH_PRENOM" value="{{ old('ADH_PRENOM', $adherent->ADH_PRENOM ?? '') }}" required>
</div>

<div class="form-group">
    <label for="ADH_EMAIL">Email</label>
    <input type="email" class="form-control" id="ADH_EMAIL" name="ADH_EMAIL" value="{{ old('ADH_EMAIL', $adherent->ADH_EMAIL ?? '') }}" required>
</div>

<div class="form-group">
    <label for="ADH_ROLE">Role</label>
    <select class="form-control" id="ADH_ROLE" name="ADH_ROLE" required>
        <option value="0" {{ (string) old('ADH_ROLE', $adherent->ADH_ROLE ?? 0) === '0' ? 'selected' : '' }}>ADHERENT</option>
        <option value="1" {{ (string) old('ADH_ROLE', $adherent->ADH_ROLE ?? 0) === '1' ? 'selected' : '' }}>ADMIN</option>
    </select>
</div>

<div class="form-group">
    <label for="ADH_PASSWORD">Mot de passe {{ isset($adherent) ? '(laisser vide pour ne pas changer)' : '' }}</label>
    <input type="password" class="form-control" id="ADH_PASSWORD" name="ADH_PASSWORD" {{ isset($adherent) ? '' : 'required' }}>
</div>

<div class="form-group">
    <label for="ADH_DDN">Date de naissance</label>
    <input type="date" class="form-control" id="ADH_DDN" name="ADH_DDN" value="{{ old('ADH_DDN', $adherent->ADH_DDN ?? '') }}">
</div>

<div class="form-group">
    <label for="ADH_ADRESSE">Adresse</label>
    <input type="text" class="form-control" id="ADH_ADRESSE" name="ADH_ADRESSE" value="{{ old('ADH_ADRESSE', $adherent->ADH_ADRESSE ?? '') }}">
</div>