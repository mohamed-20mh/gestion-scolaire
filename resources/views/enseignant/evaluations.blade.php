@extends('layouts.enseignant')

@section('title', 'Mes Évaluations')

@section('content')
<div class="container">
    <h3 class="mb-4">Mes Évaluations</h3>

    <a href="{{ route('enseignant.evaluations.create') }}" class="btn btn-primary mb-3">Ajouter une Évaluation</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matière</th>
                <th>Groupe</th>
                <th>Type</th>
                <th>Année scolaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->matiere->matiere }}</td>
                    <td>{{ $evaluation->groupe->groupe }}</td>
                    <td>{{ $evaluation->typeEvaluation->type_evaluation }}</td>
                    <td>{{ $evaluation->anneeScolaire->annee_scolaire }}</td>
                    <td>
                        <a href="{{ route('enseignant.evaluations.show', $evaluation->id) }}" class="btn btn-outline-info">Voir</a>
                        <a href="{{ route('enseignant.evaluations.edit', $evaluation->id) }}" class="btn btn-outline-warning">Modifier</a>
                        <form method="POST" action="{{ route('enseignant.evaluations.destroy', $evaluation->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                        </form>
                        <a href="{{ route('enseignant.evaluation.notes.create', $evaluation->id) }}" class="btn btn-success">Ajouter Notes</a>
                        <a href="{{ route('enseignant.evaluation.notes.edit', $evaluation->id) }}" class="btn btn-success">Modifier Notes</a>
                        <a href="{{ route('enseignant.evaluation.notes', $evaluation->id) }}" class="btn btn-outline-success">Notes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

