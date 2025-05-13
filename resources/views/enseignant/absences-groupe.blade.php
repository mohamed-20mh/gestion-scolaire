@extends('layouts.enseignant')

@section('content')
<div class="container">
    <h2>Groupes que j'enseigne - Absences</h2>

    @if($groupes->isEmpty())
        <div class="alert alert-warning">Aucun groupe trouvé.</div>
    @else
        <div class="list-group">
            @foreach($groupes as $groupe)
                <a href="{{ route('enseignant.absences.index', $groupe->id) }}" class="list-group-item list-group-item-action">
                    {{ $groupe->groupe }} (Niveau : {{ $groupe->niveau->niveau }})
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
