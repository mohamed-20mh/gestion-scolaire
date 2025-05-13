@extends('layouts.enseignant') {{-- ton layout principal --}}

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h3 class="mb-4">Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h3>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #1C2331;">Mes Matières</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($enseignantMatieres as $matiere)
                            <li class="list-group-item">{{ $matiere->matiere }}</li>
                        @empty
                            <li class="list-group-item">Aucune matière affectée</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #1C2331;">Mes Groupes</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($enseignantGroupes as $groupe)
                            <li class="list-group-item">{{ $groupe->groupe }}</li>
                        @empty
                            <li class="list-group-item">Aucun groupe affecté</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
