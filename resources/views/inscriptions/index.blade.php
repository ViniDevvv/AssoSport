@extends('layouts.app')

@section('title', 'Mes inscriptions')

@section('content')
    <h2>Mes inscriptions</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Competition</th>
                <th>Date competition</th>
                <th>Date demande</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inscriptions as $inscription)
                <tr>
                    <td>{{ $inscription->INS_NUM }}</td>
                    <td>{{ $inscription->COM_NOM }} ({{ $inscription->COM_ID }})</td>
                    <td>{{ $inscription->COM_DATE ? \Carbon\Carbon::parse($inscription->COM_DATE)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $inscription->INS_DATE ? \Carbon\Carbon::parse($inscription->INS_DATE)->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if((int) $inscription->INS_ETAT === 1)
                            Acceptee
                        @elseif((int) $inscription->INS_ETAT === 2)
                            Refusee
                        @else
                            En attente
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucune inscription pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
