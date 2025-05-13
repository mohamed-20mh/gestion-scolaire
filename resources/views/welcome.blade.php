<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gestion Scolaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f6ff;
            font-family: 'Arial', sans-serif;
        }
        .btn-custom {
            background-color: #ff6f61;
            color: #fff;
            padding: 12px 25px;
            border-radius: 25px;
            border: none;
        }
        .btn-custom:hover {
            background-color: #e65b50;
        }
    </style>
</head>
<body>

<div class="container-fluid py-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start px-5">
            <h1 class="display-4 fw-bold text-primary">Online Education</h1>
            <p class="lead text-muted mt-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi.
            </p>
            <a href="{{ route('login') }}" class="btn btn-custom mt-4">Se Connecter</a>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/education-illustration.jpg') }}" alt="Education Illustration" class="img-fluid">
        </div>
    </div>
</div>

</body>
</html>
