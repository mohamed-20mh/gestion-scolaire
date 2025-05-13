@extends('layouts.enseignant')

@section('content')
<div class="container">
    <h3>Notes pour l'évaluation : {{ $evaluation->id }} ({{ $groupe->groupe }})</h3>

    <form action="{{ route('enseignant.evaluation.notes.store', $evaluation->id) }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Élève</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eleves as $eleve)
                    <tr>
                        <td>{{ $eleve->prenom }} {{ $eleve->nom }}</td>
                        <td>
                            <input type="hidden" name="notes[{{ $eleve->id }}][user_id]" value="{{ $eleve->id }}">
                            <input type="number" step="0.25" name="notes[{{ $eleve->id }}][note]" class="form-control" required>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Enregistrer les notes</button>
        <a href="{{ route('enseignant.evaluations') }}" class="btn btn-secondary">Annuler</button>
    </form>
</div>
@endsection
