@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
<div class="card" style="width: 26rem;">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Détails du Niveau</h5>
    </div>
    <div class="card-header">
      Matiere : {{$matiere->matiere}}
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Date de creation: {{$matiere->created_at}}</li>
        <li class="list-group-item">Date de modification: {{$matiere->updated_at}}</li>
    </ul>
    <div class="card-footer text-end">
        <a class="btn btn-outline-secondary" href="{{route('matieres.index')}}"><i class="bi bi-chevron-left"></i> Retour</a>
    </div>
</div>
</div>
@endsection
