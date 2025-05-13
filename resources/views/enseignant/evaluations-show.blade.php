@extends('layouts.enseignant')

@section('title', 'Détails Évaluation')

@section('content')
<div class="container">
    <h3 class="mb-4">Détails de l'Évaluation</h3>
    <div class="card p-3">
        <p><strong>ID :</strong> {{ $evaluation->id }}</p>
        <p><strong>Matière :</strong> {{ $evaluation->matiere->matiere }}</p>
        <p><strong>Groupe :</strong> {{ $evaluation->groupe->groupe }}</p>
        <p><strong>Type :</strong> {{ $evaluation->typeEvaluation->type_evaluation }}</p>
        <p><strong>Année scolaire :</strong> {{ $evaluation->anneeScolaire->annee_scolaire }}</p>
        <a href="{{ route('enseignant.evaluations') }}" class="btn btn-outline-secondary">Retour</a>
    </div>
</div>
@endsection
