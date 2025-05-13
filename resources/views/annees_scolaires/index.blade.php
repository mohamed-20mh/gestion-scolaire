@extends('layouts.admin')
@section('content')
<a href="{{route('annees_scolaires.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Annee Scolaire</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($annees as $annee)
    <tr>
        <td>{{$annee->id}}</td>
        <td>{{$annee->annee_scolaire}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('annees_scolaires.show', compact('annee'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('annees_scolaires.edit', compact('annee'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('annees_scolaires.destroy', compact('annee'))}}" method="POST">
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
{{ $annees->links('vendor.pagination.bootstrap-4') }}
@endsection
