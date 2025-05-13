@extends('layouts.admin')
@section('content')
<a href="{{route('types_evaluations.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Type Evaluation</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($types_evaluations as $type_evaluation)
    <tr>
        <td>{{$type_evaluation->id}}</td>
        <td>{{$type_evaluation->type_evaluation}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('types_evaluations.show', $type_evaluation->id)}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('types_evaluations.edit', $type_evaluation->id)}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('types_evaluations.destroy', $type_evaluation->id)}}" method="POST">
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
{{ $type_evaluations->links('vendor.pagination.bootstrap-4') }}
@endsection
