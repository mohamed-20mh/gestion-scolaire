@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card" style="width: 26rem;">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Détails d'Enseignement</h5>
        </div>
        <div class="card-header">
        Enseignant : {{$record->enseignant->nom}} {{$record->enseignant->prenom}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Groupe: {{$record->groupe->groupe}}</li>
            <li class="list-group-item">Matiere: {{$record->matiere->matiere}}</li>
            <li class="list-group-item">Annee Scolaire: {{$record->anneeScolaire->annee_scolaire}}</li>
            <li class="list-group-item">Date de creation: {{$record->created_at}}</li>
            <li class="list-group-item">Date de modification: {{$record->updated_at}}</li>
        </ul>
        <div class="card-footer text-end">
            <a class="btn btn-outline-secondary" href="{{route('enseignant_groupe_matiere.index')}}"><i class="bi bi-chevron-left"></i> Retour</a>
        </div>
    </div>
</div>
@endsection
