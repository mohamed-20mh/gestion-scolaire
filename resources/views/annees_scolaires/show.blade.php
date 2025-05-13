@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
<div class="card" style="width: 26rem;">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Détails de l'Annee Scolaire</h5>
    </div>
    <div class="card-header">
      Annee Scolaire : {{$annee->annee_scolaire}}
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Date de creation: {{$annee->created_at}}</li>
        <li class="list-group-item">Date de modification: {{$annee->updated_at}}</li>
    </ul>
    <div class="card-footer text-end">
        <a class="btn btn-outline-secondary" href="{{route('annees_scolaires.index')}}"><i class="bi bi-chevron-left"></i> Retour</a>
    </div>
</div>
</div>
@endsection
