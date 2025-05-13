@extends('layouts.admin')
@section('content')
<form action="{{route('matieres.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="matiere">Matiere</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="matiere" id="matiere" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('matieres.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

