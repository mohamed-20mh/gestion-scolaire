@extends('layouts.admin')
@section('content')
<a href="{{route('groupes.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Groupe</th>
        <th>Niveau</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($groupes as $groupe)
    <tr>
        <td>{{$groupe->id}}</td>
        <td>{{$groupe->groupe}}</td>
        <td>{{$groupe->niveau->niveau}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('groupes.show', compact('groupe'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('groupes.edit', compact('groupe'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('groupes.destroy', compact('groupe'))}}" method="POST">
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
{{ $groupes->links('vendor.pagination.bootstrap-4') }}
@endsection
