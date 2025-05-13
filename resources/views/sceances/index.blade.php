@extends('layouts.admin')
@section('content')
<a href="{{route('sceances.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Date de Sceance</th>
        <th>Heure debut</th>
        <th>Heure fin</th>
        <th>Groupe</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($sceances as $sceance)
    <tr>
        <td>{{$sceance->id}}</td>
        <td>{{$sceance->date_sceance}}</td>
        <td>{{$sceance->heure_debut}}</td>
        <td>{{$sceance->heure_fin}}</td>
        <td>{{$sceance->groupe->groupe}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('sceances.show', compact('sceance'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('sceances.edit', compact('sceance'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('sceances.destroy', compact('sceance'))}}" method="POST">
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
{{ $sceances->links('vendor.pagination.bootstrap-4') }}
@endsection
