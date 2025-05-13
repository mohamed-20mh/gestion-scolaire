@extends('layouts.enseignant')

@section('title', 'Notes Évaluation')

@section('content')
<div class="container">
    <h3 class="mb-4">Notes de l'Évaluation : {{ $evaluation->matiere->matiere }}</h3>

    @if($notes->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Groupe</th>
                    <th>Élève</th>
                    <th>Note</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->evaluation->groupe->groupe }}</td>
                    <td>{{ $note->eleve->prenom }} {{ $note->eleve->nom }}</td>
                    <td>{{ $note->note }}</td>
                    <td>{{ $note->created_at }}</td>
                    <td>
                        <form action="{{ route('enseignant.evaluation.notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune note enregistrée pour cette évaluation.</p>
    @endif

    <a href="{{ route('enseignant.evaluations') }}" class="btn btn-outline-secondary">Retour</a>
</div>
@endsection
