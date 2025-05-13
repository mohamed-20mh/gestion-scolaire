@extends('layouts.admin')
@section('content')
<form action="{{route('niveaux.update', compact('niveau'))}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="niveau">Niveau</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="niveau" id="niveau" required value="{{$niveau->niveau}}"/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Sauvgarder <i class="bi bi-database"></i></button>
        </div>
        <div class="col">
            <a href="{{route('niveaux.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
@endsection

