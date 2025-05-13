@extends('layouts.app')
@php
    $eleves = \App\Models\User::where('role', 'eleve')->get();
    $sceances = \App\Models\Sceance::all();
@endphp
@section('content')
<form action="{{route('absences.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="user_id">Eleve</label>
        </div>
        <div class="col">
            <select class="form-select" name="user_id" id="user_id">
                @foreach ($eleves as $eleve)
                <option value="{{$eleve->id}}">{{$eleve->nom}} {{$eleve->prenom}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="sceacne_id">Sceance</label>
        </div>
        <div class="col">
            <select class="form-select" name="sceance_id" id="sceance_id">
                @foreach ($sceances as $sceance)
                <option value="{{$sceance->id}}">{{$sceance->date_sceance}} {{$sceance->heure_debut}} {{$sceance->heure_fin}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="justifier">Justifier</label>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-control" type="radio" name="justifier" id="justifier" value="true"/>
                <label class="form-check-label" for="justifier">Oui</label>
            </div>
            <div class="form-check">
                <input class="form-control" type="radio" name="justifier" id="justifier" value="false"/>
                <label class="form-check-label" for="justifier">Non</label>
            </div>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="commentaire">Commentaire</label>
        </div>
        <div class="col">
            <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('absences.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

