<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
            display: flex;
        }
        .container-main {
            padding: 10px;
        }
    </style>
    <title>GCOM</title>
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <div class="header col-md-12">
            @include('layouts.header')
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="aside col-md-2 col-12">
                @include('layouts.sidebar')
            </div>

            <div class="container-main col-md-10 col-12">
                @yield('content')
            </div>
        </div>

        <!-- Footer (Stays at the Bottom) -->
        <div class="footer">
            @include('layouts.footer')
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    >
    </script>
</body>
</html>
