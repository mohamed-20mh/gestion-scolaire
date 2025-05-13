@extends('layouts.eleve')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h2>

    {{-- Résumé --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Notes</h5>
                    <h3>{{ $totalNotes }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Absences</h5>
                    <h3>{{ $totalAbsences }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Moyenne Générale</h5>
                    <h3>{{ number_format($moyenneGenerale, 2) }}/20</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Boutons d'accès --}}
    <div class="text-center mb-5">
        <a href="{{ route('eleve.notes') }}" class="btn btn-primary me-2">Mes Notes</a>
        <a href="{{ route('eleve.absences') }}" class="btn btn-danger me-2">Mes Absences</a>
    </div>

    {{-- Notes récentes --}}
    <h4 class="mb-3">Dernières Notes</h4>
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Matière</th>
                <th>Note</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dernieresNotes as $note)
                <tr>
                    <td>{{ $note->evaluation->matiere->matiere }}</td>
                    <td>{{ $note->note }}/20</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Aucune note récente</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Absences récentes --}}
    <h4 class="mt-5 mb-3">Dernières Absences</h4>
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Heure Début</th>
                <th>Heure Fin</th>
                <th>Justifiée</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dernieresAbsences as $absence)
                <tr>
                    <td>{{ $absence->sceance->created_at->format('d/m/Y')? $absence->sceance->created_at->format('d/m/Y') : ''}}</td>
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
                    <td colspan="4">Aucune absence récente</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
