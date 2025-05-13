<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <style>
    body {
      background-color: #FFFFFF;
      min-height: 100vh;
      display: flex;
    }
    .sidebar, .navbar-custom {
      background: #1C2331;
      color: #fff;
    }
    .sidebar a {
      color: #FFFFFF;
      text-decoration: none;
      padding: 8px 12px;
      display: block;
      border-radius: 5px;
    }
    .sidebar a:hover{
      background: #21497e;
      color: #FFFFFF;
    }
    a.active{
        background: #346bb2;
        color: #FFFFFF;
    }
    .btn-logout {
      background: #F25C84;
      border: none;
      color: #FFFFFF;
    }
    .btn-logout:hover {
      background: #a72745;
    }
    .main-content {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .page-content {
      flex-grow: 1;
      padding: 1.5rem;
    }
    footer {
      background: #1C2331;
      color: #FFFFFF;
      text-align: center;
      padding: 12px 0;
    }
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg,#4099ff,#73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg,#2ed8b6,#59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg,#FFB64D,#ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg,#FF5370,#ff869a);
    }
    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }
    a{
        text-decoration: none;
    }
  </style>
</head>
<body>

<div class="d-flex flex-grow-1">
  <!-- Sidebar -->
  <div class="sidebar p-3" style="width: 240px; height: 100%;">
    <h4 class="text-white mb-4">Espace Admin</h4>
    <ul class="nav flex-column">
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Utilisateurs</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('niveaux*') ? 'active' : '' }}" href="{{ route('niveaux.index') }}">Niveaux</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('groupes*') ? 'active' : '' }}" href="{{ route('groupes.index') }}">Groupes</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('matieres*') ? 'active' : '' }}" href="{{ route('matieres.index') }}">Matières</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('sceances*') ? 'active' : '' }}" href="{{ route('sceances.index') }}">Séances</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('/admin/absences') ? 'active' : '' }}" href="{{ route('admin.absences') }}">Absences</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link {{ Request::is('evaluations/') ? 'active' : '' }}" href="{{ route('evaluations.index') }}">Évaluations</a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-custom px-4">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 h5 text-white">Système de gestion scolaire</span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-logout">Déconnexion</button>
        </form>
      </div>
    </nav>

    <!-- Page content -->
    <div class="page-content">
      @yield('content')
    </div>

    <!-- Footer -->
    <footer>
      &copy; {{ date('Y') }} Tous droits réservés - Med School System
    </footer>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
