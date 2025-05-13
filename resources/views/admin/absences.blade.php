@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Absences</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Élève</th>
                <th>Groupe</th>
                <th>Date</th>
                <th>Heure Début</th>
                <th>Heure Fin</th>
                <th>Justifiée</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absences as $absence)
                <tr>
                    <td>{{ $absence->user->prenom }} {{ $absence->user->nom }}</td>
                    <td>{{ $absence->sceance->groupe->groupe }}</td>
                    <td>{{ $absence->sceance->created_at->format('d/m/Y') }}</td>
                    <td>{{ $absence->sceance->heure_debut }}</td>
                    <td>{{ $absence->sceance->heure_fin }}</td>
                    <td>{{ $absence->justifier ? 'Oui' : 'Non' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
