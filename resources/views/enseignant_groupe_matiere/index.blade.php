@extends('layouts.admin')
@section('content')
<a href="{{route('enseignant_groupe_matiere.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Enseignant</th>
        <th>Groupe</th>
        <th>Matiere</th>
        <th>Annee Scolaire</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->enseignant->nom}} {{$record->enseignant->prenom}}</td>
        <td>{{$record->groupe->groupe}}</td>
        <td>{{$record->matiere->matiere}}</td>
        <td>{{$record->anneeScolaire->annee_scolaire}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('enseignant_groupe_matiere.show', $record->id)}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('enseignant_groupe_matiere.edit', $record->id)}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('enseignant_groupe_matiere.destroy', $record->id)}}" method="POST">
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
{{ $records->links('vendor.pagination.bootstrap-4') }}
@endsection
