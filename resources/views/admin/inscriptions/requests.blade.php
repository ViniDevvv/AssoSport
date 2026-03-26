@extends('layouts.app')

@section('title', 'Demandes d\'inscription')

@section('content')
    <h2>Demandes d'inscription de mon club</h2>

    <p>
        <a href="{{ route('admin.inscriptions.validated') }}">Voir les participants valides</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Competition</th>
                <th>Date competition</th>
                <th>Adherent</th>
                <th>Date demande</th>
                <th>Actions</th>
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
                    <td class="admin-row-actions">
                        <form action="{{ route('admin.inscriptions.status', $inscription->INS_NUM) }}" method="POST" class="inline-form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn">Valider</button>
                        </form>

                        <form action="{{ route('admin.inscriptions.status', $inscription->INS_NUM) }}" method="POST" class="inline-form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="2">
                            <button type="submit" class="btn-danger">Refuser</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucune demande en attente.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
