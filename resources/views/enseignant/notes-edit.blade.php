@extends('layouts.enseignant')

@section('content')
<div class="container">
    <h3>Modifier les notes pour l'évaluation : {{ $evaluation->id }} ({{ $groupe->groupe }})</h3>

    <form action="{{ route('enseignant.evaluation.notes.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Élève</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                    <tr>
                        <td>{{ $note->eleve->prenom }} {{ $note->eleve->nom }}</td>
                        <td>
                            <input type="hidden" name="notes[{{ $note->id }}][note_id]" value="{{ $note->id }}">
                            <input type="number" step="0.01" name="notes[{{ $note->id }}][note]" value="{{ $note->note }}" class="form-control" required>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('enseignant.evaluations') }}" class="btn btn-secondary">annuler</button>
    </form>
</div>
@endsection
