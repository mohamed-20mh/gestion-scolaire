@extends('layouts.admin')
@section('content')
<a href="{{route('matieres.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Matiere</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($matieres as $matiere)
    <tr>
        <td>{{$matiere->id}}</td>
        <td>{{$matiere->matiere}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('matieres.show', compact('matiere'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('matieres.edit', compact('matiere'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('matieres.destroy', compact('matiere'))}}" method="POST">
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
{{ $matieres->links('vendor.pagination.bootstrap-4') }}
@endsection
