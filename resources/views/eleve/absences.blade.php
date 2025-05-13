@extends('layouts.eleve')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Mes Absences</h2>

    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Heure Début</th>
                    <th>Heure Fin</th>
                    <th>Justifiée</th>
                </tr>
            </thead>
            <tbody>
                @forelse($absences as $absence)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($absence->sceance->heure_debut)->format('d/m/Y') }}</td>
                    <td>{{ $absence->sceance->heure_debut }}</td>
                    <td>{{ $absence->sceance->heure_fin }}</td>
                    <td>
                        @if($absence->justifier)
                            <span class="badge bg-success">Oui</span>
                        @else
                            <span class="badge bg-danger">Non</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Aucune absence enregistrée pour le moment.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
