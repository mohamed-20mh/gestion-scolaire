@extends('layouts.admin')
@section('content')
<a href="{{route('niveaux.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Nivau</th>
        <th>Acctions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($niveaux as $niveau)
    <tr>
        <td>{{$niveau->id}}</td>
        <td>{{$niveau->niveau}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('niveaux.show', compact('niveau'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('niveaux.edit', compact('niveau'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('niveaux.destroy', compact('niveau'))}}" method="POST">
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
{{ $niveaux->links('vendor.pagination.bootstrap-4') }}
@endsection
