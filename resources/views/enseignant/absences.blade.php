@extends('layouts.enseignant')

@section('content')
<div class="container">
    <h2>Absences - Groupe : {{ $groupe->groupe }}</h2>

    <a href="{{ route('enseignant.absences.create', $groupe->id) }}" class="btn btn-outline-primary mb-3">Ajouter Absence</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Élève</th>
                <th>Séance</th>
                <th>Justifiée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absences as $absence)
            <tr>
                <td>{{ $absence->user->prenom }} {{ $absence->user->nom }}</td>
                <td>{{ $absence->sceance->heure_debut }} - {{ $absence->sceance->heure_fin }}</td>
                <td>{{ $absence->justifier ? 'Oui' : 'Non' }}</td>
                <td>
                    <a href="{{ route('enseignant.absences.edit', $absence) }}" class="btn btn-outline-warning">Modifier</a>
                    <form action="{{ route('enseignant.absences.destroy', $absence) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
