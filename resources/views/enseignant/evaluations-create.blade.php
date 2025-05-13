@extends('layouts.enseignant')

@section('title', 'Nouvelle Évaluation')

@section('content')
<div class="container">
    <h3 class="mb-4">Créer une nouvelle évaluation</h3>

    <form action="{{ route('enseignant.evaluations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="groupe_id" class="form-label">Groupe</label>
            <select name="groupe_id" class="form-select" required>
                <option value="">Sélectionner un groupe</option>
                @foreach($matiereGroupes as $mg)
                    <option value="{{ $mg->groupe->id }}">{{ $mg->groupe->groupe }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="matiere_id" class="form-label">Matière</label>
            <select name="matiere_id" class="form-select" required>
                <option value="">Sélectionner une matière</option>
                @foreach($matiereGroupes as $mg)
                    <option value="{{ $mg->matiere->id }}">{{ $mg->matiere->matiere }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type_evaluation_id" class="form-label">Type d'évaluation</label>
            <select name="type_evaluation_id" class="form-select" required>
                <option value="">Sélectionner un type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type_evaluation }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="annee_scolaire_id" class="form-label">Année scolaire</label>
            <select name="annee_scolaire_id" class="form-select" required>
                <option value="">Sélectionner une année</option>
                @foreach($annees as $annee)
                    <option value="{{ $annee->id }}">{{ $annee->annee_scolaire }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('enseignant.evaluations') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
