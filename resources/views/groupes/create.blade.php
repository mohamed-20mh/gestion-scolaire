@extends('layouts.admin')
@php
    $niveaux = \App\Models\Niveau::all();
@endphp
@section('content')
<form action="{{route('groupes.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="groupe">Groupe</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="groupe" id="groupe" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="niveau_id">Niveau</label>
        </div>
        <div class="col">
            <select class="form-select" name="niveau_id" id="niveau_id">
                @foreach ($niveaux as $niveau)
                    <option value="{{$niveau->id}}">{{$niveau->niveau}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('groupes.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

