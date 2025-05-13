@extends('layouts.app')
@section('content')
<a href="{{route('evaluations.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Type d'Evaluation</th>
        <th>Eleve</th>
        <th>Groupe</th>
        <th>Matiere</th>
        <th>Annee Scolaire</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($evaluations as $evaluation)
    <tr>
        <td>{{$evaluation->id}}</td>
        <td>{{$evaluation->typeEvaluation>type_evaluation}}</td>
        <td>{{$evaluation->eleve->nom}} {{$evaluation->eleve->prenom}}</td>
        <td>{{$evaluation->groupe->groupe}}</td>
        <td>{{$evaluation->matiere->matiere}}</td>
        <td>{{$evaluation->anneeScolaire->annee_scolaire}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('evaluations.show', compact('evaluation'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('evaluations.edit', compact('evaluation'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('evaluations.destroy', compact('evaluation'))}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" onclick="confirm('Vous etes sur de supprimmer cet enregistrement')">Supprimer <i class="bi bi-trash"></i></button>
            </form>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $evaluations->links('vendor.pagination.bootstrap-4') }}
@endsection
