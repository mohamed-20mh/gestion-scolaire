@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card" style="width: 26rem;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Détails d'Evaluation</h5>
        </div>
        <div class="card-header">
        Enseignant : {{$evaluation->enseignant->nom}} {{$evaluation->enseignant->prenom}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Groupe: {{$evaluation->groupe->groupe}}</li>
            <li class="list-group-item">Matiere: {{$evaluation->matiere->matiere}}</li>
            <li class="list-group-item">Annee Scolaire: {{$evaluation->anneeScolaire->annee_scolaire}}</li>
            <li class="list-group-item">Date de creation: {{$evaluation->created_at}}</li>
            <li class="list-group-item">Date de modification: {{$evaluation->updated_at}}</li>
        </ul>
        <div class="card-footer text-end">
            <a class="btn btn-outline-secondary" href="{{route('evaluations.index')}}"><i class="bi bi-chevron-left"></i> Retour</a>
        </div>
    </div>
</div>
@endsection
