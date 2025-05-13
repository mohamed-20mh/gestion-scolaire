@extends('layouts.admin') {{-- ton layout principal --}}

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h3 class="m-b-20"><i class="bi bi-person"></i> Administrateurs</h3>
                    <h2 class="text-center">{{ $adminsCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h3 class="m-b-20"><i class="bi bi-person-video3"></i> Enseignants</h3>
                    <h2 class="text-center">{{ $enseignantsCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h3 class="m-b-20"><i class="bi bi-people"></i> Élèves</h3>
                    <h2 class="text-center">{{ $elevesCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <a href="{{ route('groupes.index') }}">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h3 class="m-b-20"><i class="bi bi-collection"></i> Groupes</h3>
                    <h2 class="text-center">{{ $groupesCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <a href="{{ route('admin.absences') }}">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h3 class="m-b-20">Taux d'absences</h3>
                    <h2 class="text-center">{{ $tauxAbsence }}%</h2>
                </div>
            </div>
            </a>
        </div>
	</div>
</div>
@endsection
