@extends('layouts.admin')
@section('content')
<form action="{{route('types_evaluations.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="type_evaluation">Type Evaluation</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="type_evaluation" id="type_evaluation" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('types_evaluations.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

