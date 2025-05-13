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
    .card {
        border-radius: 1rem;
        transition: 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
  </style>
</head>
<body>

    <div class="main-content">

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
