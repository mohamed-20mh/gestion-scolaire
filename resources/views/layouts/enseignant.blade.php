<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enseignant | @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    .main-content {
        flex: 1;
        display: flex;
    }

    .content-wrapper {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .page-content {
        flex: 1;
        padding: 20px;
    }

    footer {
        background: #1C2331;
        color: #fff;
        text-align: center;
        padding: 10px 0;
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
    .sidebar a:hover {
      background: #21497e;
      color: #FFFFFF;
    }
    a.active {
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
  </style>
</head>
<body>

    <div class="main-content">
      <!-- Sidebar -->
      <div class="sidebar p-3" style="width: 240px; height: 100%;">
        <h4 class="text-white mb-4">Espace Enseignant</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-1">
            <a class="nav-link {{ Request::is('enseignant/dashboard') ? 'active' : '' }}" href="{{ route('enseignant.dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item mb-1">
            <a class="nav-link" href="{{ route('enseignant.evaluations') }}">Évaluations</a>
          </li>
          <li class="nav-item mb-1">
            <a class="nav-link" href="">Notes</a>
          </li>
          <li class="nav-item mb-1">
            <a class="nav-link" href="{{ route('enseignant.groupes.absences') }}">Absences</a>
          </li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="content-wrapper">
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
          &copy; {{ date('Y') }} Tous droits réservés
        </footer>
      </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
