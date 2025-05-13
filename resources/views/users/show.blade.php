@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
<div class="card" style="width: 26rem;">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Détails de l'utilisateur</h5>
    </div>
    <div class="card-header">
      Nom Complet : {{$user->nom}} {{$user->prenom}}
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Rôle: {{$user->role}}</li>
        <li class="list-group-item">Email: {{$user->email}}</li>
        <li class="list-group-item">Date de Naissance: {{$user->date_naissance}}</li>
        <li class="list-group-item">Matricule: {{$user->matricule}}</li>
        <li class="list-group-item">Spécialité: {{$user->specialite}}</li>
        <li class="list-group-item">CNE: {{$user->cne}}</li>
        <li class="list-group-item">Groupe: {{ $user->groupe?->groupe ?? '' }}</li>
        <li class="list-group-item">Date de creation: {{$user->created_at}}</li>
        <li class="list-group-item">Date de modification: {{$user->updated_at}}</li>
    </ul>
    <div class="card-footer text-end">
        <a class="btn btn-outline-secondary" href="{{route('users.index')}}"><i class="bi bi-chevron-left"></i> Retour</a>
    </div>
</div>
</div>
@endsection
