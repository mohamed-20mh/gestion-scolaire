@extends('layouts.admin')
@section('content')
<form action="{{route('annees_scolaires.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="annee_scolaire">Annee Scolaire</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="annee_scolaire" id="annee_scolaire" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('annees_scolaires.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

