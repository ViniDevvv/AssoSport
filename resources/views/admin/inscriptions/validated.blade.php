@extends('layouts.app')

@section('title', 'Participants valides')

@section('content')
    <h2>Participants valides de mon club</h2>

    <p>
        <a href="{{ route('admin.inscriptions.requests') }}">Retour aux demandes d'inscription</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Competition</th>
                <th>Date competition</th>
                <th>Participant</th>
                <th>Date demande</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inscriptions as $inscription)
                <tr>
                    <td>{{ $inscription->INS_NUM }}</td>
                    <td>{{ $inscription->COM_NOM }} ({{ $inscription->COM_ID }})</td>
                    <td>{{ $inscription->COM_DATE ? \Carbon\Carbon::parse($inscription->COM_DATE)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $inscription->ADH_PRENOM }} {{ $inscription->ADH_NOM }} ({{ $inscription->ADH_ID }})</td>
                    <td>{{ $inscription->INS_DATE ? \Carbon\Carbon::parse($inscription->INS_DATE)->format('d/m/Y') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucun participant valide pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
