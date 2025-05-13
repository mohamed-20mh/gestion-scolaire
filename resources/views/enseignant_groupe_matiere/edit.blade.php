@extends('layouts.admin')
@php
    $groupes = \App\Models\Groupe::all();
    $enseignants = \App\Models\User::where('role', 'enseignant')->get();
    $matieres = \App\Models\Matiere::all();
    $annee_scolaires = \App\Models\AnneeScolaire::all();
@endphp
@section('content')
<form action="{{route('enseignant_groupe_matiere.update', $record->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="user_id">Enseignant</label>
        </div>
        <div class="col">
            <select class="form-select" name="user_id" id="user_id">
                @foreach ($enseignants as $enseignant)
                    <option value="{{$enseignant->id}}" {{$enseignant->id == $record->user_id ? 'selected' : ''}}>{{$enseignant->nom}} {{$enseignant->prenom}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="groupe_id">Groupe</label>
        </div>
        <div class="col">
            <select class="form-select" name="groupe_id" id="groupe_id">
                @foreach ($groupes as $groupe)
                    <option value="{{$groupe->id}}" {{$groupe->id == $record->groupe_id ? 'selected' : ''}}>{{$groupe->groupe}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="matiere_id">Matiere</label>
        </div>
        <div class="col">
            <select class="form-select" name="matiere_id" id="matiere_id">
                @foreach ($matieres as $matiere)
                    <option value="{{$matiere->id}}" {{$matiere->id == $record->matiere_id ? 'selected' : ''}}>{{$matiere->matiere}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="annee_scolaire_id">Annee Scolaire</label>
        </div>
        <div class="col">
            <select class="form-select" name="annee_scolaire_id" id="annee_scolaire_id">
                @foreach ($annee_scolaires as $annee_scolaire)
                    <option value="{{$annee_scolaire->id}}" {{$annee_scolaire->id == $record->annee_scolaire_id ? 'selected' : ''}}>{{$annee_scolaire->annee_scolaire}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('enseignant_groupe_matiere.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

