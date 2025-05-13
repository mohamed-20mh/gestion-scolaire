@extends('layouts.enseignant')

@section('title', 'Modifier Évaluation')

@section('content')
<div class="container">
    <h3 class="mb-4">Modifier l'Évaluation</h3>

    <form action="{{ route('enseignant.evaluation.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type_evaluation_id" class="form-label">Type d'évaluation</label>
            <input type="text" class="form-control" value="{{ $evaluation->typeEvaluation->type_evaluation }}" readonly>
        </div>

        <div class="mb-3">
            <label for="matiere_id" class="form-label">Matière</label>
            <input type="text" class="form-control" value="{{ $evaluation->matiere->matiere }}" readonly>
        </div>

        <div class="mb-3">
            <label for="groupe_id" class="form-label">Groupe</label>
            <input type="text" class="form-control" value="{{ $evaluation->groupe->groupe }}" readonly>
        </div>

        <button type="submit" class="btn btn-outline-primary">Sauvegarder</button>
        <a href="{{ route('enseignant.evaluations') }}" class="btn btn-outline-secondary">Annuler</a>
    </form>
</div>
@endsection
