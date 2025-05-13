@extends('layouts.admin')
@php
    $groupes = \App\Models\Groupe::all();
@endphp
@section('content')
<form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row m-2">
        <div class="col">
            <label for="role">Role</label>
        </div>
        <div class="col">
            <select class="form-select" name="role" id="role" onchange="showDiv()">
                <option value="admin">Admin</option>
                <option value="enseignant">Enseignant</option>
                <option value="eleve">Eleve</option>
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="prenom">Prenom</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="prenom" id="prenom" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="nom">Nom</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="nom" id="nom" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="email">Email</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="email" id="email" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="password">Mote de Pass</label>
        </div>
        <div class="col">
            <input class="form-control" type="password" name="password" id="password" required/>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <label class="form-label" for="date_naissance">Date Naissance</label>
        </div>
        <div class="col">
            <input class="form-control" type="date" name="date_naissance" id="date_naissance" required/>
        </div>
    </div>
    <div class="row m-2" id="divmt" style="display: none;">
        <div class="col">
            <label class="form-label" for="matricule">Matricule</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="matricule" id="matricule"/>
        </div>
    </div>
    <div class="row m-2" id="divspe" style="display: none;">
        <div class="col">
            <label class="form-label" for="specialite">Specialite</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="specialite" id="specialite"/>
        </div>
    </div>
    <div class="row m-2" id="divcne" style="display: none;">
        <div class="col">
            <label class="form-label" for="cne">CNE</label>
        </div>
        <div class="col">
            <input class="form-control" type="text" name="cne" id="cne"/>
        </div>
    </div>
    <div class="row m-2" id="divgr" style="display: none;">
        <div class="col">
            <label class="form-label" for="groupe_id">Groupe</label>
        </div>
        <div class="col">
            <select class="form-select" name="groupe_id" id="groupe_id">
                @foreach ($groupes as $groupe)
                    <option value="{{$groupe->id}}">{{$groupe->groupe}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <button type="submit" class="btn btn-outline-primary">Ajouter <i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="col">
            <a href="{{route('users.index')}}" class="btn btn-outline-secondary">Annuler <i class="bi bi-backspace"></i></a>
        </div>
    </div>
</form>
<script>
    function showDiv(){
        if (document.getElementById('role').value == 'admin'){
            document.getElementById('divgr').style.display = 'none';
            document.getElementById('divcne').style.display = 'none';
            document.getElementById('divspe').style.display = 'none';
            document.getElementById('divmt').style.display = 'none';
        }
        else if (document.getElementById('role').value == 'eleve'){
            document.getElementById('divgr').style.display = 'block';
            document.getElementById('divcne').style.display = 'block';
            document.getElementById('divspe').style.display = 'none';
            document.getElementById('divmt').style.display = 'none';
        }
        else if (document.getElementById('role').value == 'enseignant'){
            document.getElementById('divgr').style.display = 'none';
            document.getElementById('divcne').style.display = 'none';
            document.getElementById('divspe').style.display = 'block';
            document.getElementById('divmt').style.display = 'block';
        }
        //document.getElementById('groupe').style.display = document.getElementById('role').value == 'admin' ? 'none' : 'block';
    }
</script>
@endsection

