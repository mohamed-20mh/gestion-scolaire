@extends('layouts.eleve')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Mes Notes</h2>

    @if(count($notesParMatiere))
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Matière</th>
                        @php
                            // Calculer le nombre max de notes pour fixer les colonnes
                            $maxNotes = max(array_map('count', $notesParMatiere));
                        @endphp
                        @for($i = 1; $i <= $maxNotes; $i++)
                            <th>Note {{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($notesParMatiere as $matiere => $notes)
                        <tr>
                            <td class="fw-bold">{{ $matiere }}</td>
                            @foreach($notes as $note)
                                <td>{{ $note }}/20</td>
                            @endforeach
                            @for($i = count($notes); $i < $maxNotes; $i++)
                                <td>-</td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">Aucune note enregistrée.</div>
    @endif
</div>
@endsection
