@extends('layouts.admin')
@php
    $groupes = \App\Models\Groupe::all();
@endphp
@section('content')
<form action="{{route('sceances.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="groupe_id">Groupe</label>
        </div>
        <div class="col">
            <select class="form-select" name="groupe_id" id="groupe_id">
                @foreach ($groupes as $groupe)
                    <option value="{{$groupe->id}}" {{$groupe->id == $sceance->groupe_id ? 'selected' : ''}}>{{$groupe->groupe}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="date_sceance">Date Sceance</label>
        </div>
        <div class="col">
            <input class="form-control" type="date" name="date_sceance" id="date_sceance" value="{{sceance->date_sceance}}" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="heure_debut">Heure Debut</label>
        </div>
        <div class="col">
            <input class="form-control" type="time" name="heure_debut" id="heure_debut" value="{{sceance->heure_debut}}" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="heure_fin">Heure Fin</label>
        </div>
        <div class="col">
            <input class="form-control" type="time" name="heure_fin" id="heure_fin" value="{{sceance->heure_fin}}" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('sceances.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

