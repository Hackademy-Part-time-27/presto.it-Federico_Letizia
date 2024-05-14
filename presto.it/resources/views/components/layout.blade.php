<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <style>
        body{
            height: 3000px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-primary-subtle sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fs-2" href="#">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href=/register>Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5" href="#">Contatti</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5" href="#">Chi siamo</a>
            </li>
        </ul>
        </div>
        <div>
            <div class="d-flex text-center">
                <a type="button" class="btn btn-info" href=/register>Registrati</a>
                <a type="button" class="btn btn-info mx-4">Accedi</a>
            </div>
        </div>
    </div>
    </nav>

    {{ $slot}}
</body>
</html>