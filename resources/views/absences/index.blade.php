@extends('layouts.app')
@section('content')
<a href="{{route('absences.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Eleve</th>
        <th>Sceance</th>
        <th>Justifier</th>
        <th>Commentaire</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($absences as $absence)
    <tr>
        <td>{{$absence->id}}</td>
        <td>{{$absence->eleve->prenom}}</td>
        <td>{{$absence->sceacne->date_sceance}} {{$absence->sceacne->heure_debut}} {{$absence->sceacne->heure_fin}}</td>
        <td>{{$absence->justifier ? 'Oui' : 'Non'}}</td>
        <td>{{$absence->commentaire}}</td>
        <td></td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('absences.show', compact('absence'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('absences.edit', compact('absence'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('absences.destroy', compact('absence'))}}" method="POST">
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
{{ $absences->links('vendor.pagination.bootstrap-4') }}
@endsection
