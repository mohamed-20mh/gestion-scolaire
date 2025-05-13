@extends('layouts.enseignant')

@section('content')
<div class="container">
    <h2>Ajouter Absence - Groupe : {{ $groupe->groupe }}</h2>

    <form action="{{ route('enseignant.absences.store') }}" method="POST">
        @csrf

        <input type="hidden" name="groupe_id" value="{{ $groupe->id }}">

        <div class="mb-3">
            <label for="user_id" class="form-label">Élève</label>
            <select name="user_id" class="form-control" required>
                @foreach($eleves as $eleve)
                    <option value="{{ $eleve->id }}">{{ $eleve->prenom }} {{ $eleve->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sceance_id" class="form-label">Séance</label>
            <select name="sceance_id" class="form-control" required>
                @foreach($sceances as $sceance)
                    <option value="{{ $sceance->id }}">{{ $sceance->heure_debut }} - {{ $sceance->heure_fin }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="justifier" class="form-label">Justifiée ?</label>
            <select name="justifier" class="form-control" required>
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <button class="btn btn-outline-primary">Enregistrer</button>
        <a href="{{ route('enseignant.absences.index', $groupe->id) }}" class="btn btn-outline-secondary">Annuler</a>
    </form>
</div>
@endsection
