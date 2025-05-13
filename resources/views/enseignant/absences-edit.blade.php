@extends('layouts.enseignant')

@section('content')
<div class="container">
    <h2>Modifier Absence - {{ $absence->user->prenom }} {{ $absence->user->nom }}</h2>

    <form action="{{ route('enseignant.absences.update', $absence->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="justifier" class="form-label">Justifiée ?</label>
            <select name="justifier" class="form-control" required>
                <option value="0" {{ !$absence->justifier ? 'selected' : '' }}>Non</option>
                <option value="1" {{ $absence->justifier ? 'selected' : '' }}>Oui</option>
            </select>
        </div>

        <button class="btn btn-outline-primary">Modifier</button>
        <a href="{{ route('enseignant.absences.index', $absence->sceance->groupe_id) }}" class="btn btn-outline-secondary">Annuler</a>
    </form>
</div>
@endsection
