@extends('layouts.app')

@section('title', 'Modifier competition')

@section('content')
    <h2>Modifier competition {{ $competition->COM_NOM }}</h2>

    <form action="{{ route('admin.competitions.update', $competition->COM_ID) }}" method="POST" class="form-grid">
        @csrf
        @method('PUT')

        <label for="COM_ID">ID competition</label>
        <input type="text" id="COM_ID" value="{{ $competition->COM_ID }}" disabled>

        <label for="COM_NOM">Nom</label>
        <input type="text" id="COM_NOM" name="COM_NOM" value="{{ old('COM_NOM', $competition->COM_NOM) }}" required maxlength="100">

        <label for="DIS_ID">Discipline</label>
        <select id="DIS_ID" name="DIS_ID" required>
            <option value="">-- Choisir --</option>
            @foreach($disciplines as $discipline)
                <option value="{{ $discipline->DIS_ID }}" {{ old('DIS_ID', $competition->DIS_ID) == $discipline->DIS_ID ? 'selected' : '' }}>
                    {{ $discipline->DIS_NOM }} ({{ $discipline->DIS_ID }})
                </option>
            @endforeach
        </select>

        <label for="CLU_ID_LOCAL">Club local</label>
        <select id="CLU_ID_LOCAL" name="CLU_ID_LOCAL" required>
            <option value="">-- Choisir --</option>
            @foreach($clubs as $club)
                <option value="{{ $club->CLU_ID }}" {{ old('CLU_ID_LOCAL', $competition->CLU_ID_LOCAL) == $club->CLU_ID ? 'selected' : '' }}>
                    {{ $club->CLU_NOM }} ({{ $club->CLU_ID }})
                </option>
            @endforeach
        </select>

        <label for="COM_DATE">Date</label>
        <input type="date" id="COM_DATE" name="COM_DATE" value="{{ old('COM_DATE', $competition->COM_DATE ? \Carbon\Carbon::parse($competition->COM_DATE)->format('Y-m-d') : '') }}" required>

        <div class="actions">
            <button type="submit" class="btn">Mettre a jour</button>
            <a href="{{ route('admin.competitions.index') }}">Retour</a>
        </div>
    </form>
@endsection
