@extends('layouts.admin')
@section('content')
<a href="{{route('users.create')}}" class="btn btn-outline-primary my-2">Ajouter <i class="bi bi-plus-lg"></i></a>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="table-primary">
        <th>ID</th>
        <th>Type</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Date Naissance</th>
        <th>Matricule</th>
        <th>Specialite</th>
        <th>CNE</th>
        <th>Groupe</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->prenom}}</td>
        <td>{{$user->nom}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->date_naissance}}</td>
        <td>{{$user->matricule}}</td>
        <td>{{$user->specialite}}</td>
        <td>{{$user->cne}}</td>
        <td>{{$user->groupe->groupe ?? ''}}</td>
        <td>
            <div class="d-flex justify-content-center">
            <a href="{{route('users.show', compact('user'))}}" class="btn btn-outline-info">Voir <i class="bi bi-eye"></i></a>
            <a href="{{route('users.edit', compact('user'))}}" class="btn btn-outline-warning mx-2">Modifier <i class="bi bi-pencil-square"></i></a>
            <form action="{{route('users.destroy', compact('user'))}}" method="POST">
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
{{ $users->links('vendor.pagination.bootstrap-4') }}
@endsection
