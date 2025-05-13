<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .button{
        color: white;
        background-color: #f25c84;
    }
    .button:hover{
        color: white;
        background-color: #9a2d4a;
    }
    .title{
        color: #f25c84;
    }
  </style>
</head>
<body>

  <div class="d-flex vh-100">
    <!-- Partie gauche -->
    <div class="w-50 d-flex flex-column justify-content-around align-items-center bg-white p-4">
      <div class="d-flex flex-column align-items-center">
        <img src="{{ asset('assets/Logo.png') }}" alt="Logo" class="mb-4" width="200">
        <h2 class="fs-4 fw-bold title">SYSTÈME DE GESTION SCOLAIRE</h2>
      </div>

      @if (session('error'))
        <div class="alert alert-danger w-75 text-center">
            {{ session('error') }}
        </div>
      @endif

      <form class="mt-4" style="width: 320px;" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <input type="email" name="email" placeholder="Login :" required class="form-control p-3">
        </div>
        <div class="mb-3">
          <input type="password" name="password" placeholder="Mot de passe :" required class="form-control p-3">
        </div>
        <button type="submit" class="btn w-100 p-3 fw-bold button">CONNEXION</button>
      </form>
    </div>

    <!-- Partie droite -->
    <div class="w-50 d-flex flex-column justify-content-center align-items-start text-white p-4" style="background: linear-gradient(to right, #60a5fa, #2563eb);">
      <h1 class="fs-2 fw-bold text-start">Bienvenue dans votre espace privé</h1>
      <p class="mt-3 text-start">
        Un système d'information intégré qui permet la mise en place de
        nouvelles méthodes de gestion scolaire.
      </p>
      <img src="{{ asset('assets/Illustration.png') }}" alt="Illustration" class="mt-4 align-self-center">
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
