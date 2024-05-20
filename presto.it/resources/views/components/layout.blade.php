<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{$title ?? 'Presto.it'}}</title>
    <style>
        body{
            height: 3000px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-primary-subtle sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fs-2" href="/">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5" href="#">Contatti</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5" href="#">Chi siamo</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5" href="{{route('adv.index')}}">Tutti gli Annunci</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" id="categoriesDrop" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDrop">
                @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
                <li><hr class="dropdown-divider"></li>
                @endforeach
            </li>
        </ul>
        </div>
        @auth
        <ul class="navbar-nav ms-auto dropdown-menu-end bg-primary-subtle text-end">          
            <li class=" nav-item dropdown dropdown-menu-end text-end">
                <a class="nav-link bg-info rounded text-end text-white dropdown-toggle fs-5 font-weight-bold dropdown-menu-end" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->email }}</a>
                <ul class="dropdown-menu dropdown-menu-end ms-auto" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item  font-weight-bold" href="{{ route('adv.create') }}">Crea Annuncio</a></li> 
                    <li><hr class="dropdown-divider"></a></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">esci</button>
                        </form>
                    </li> 
                </ul>
            
            </li> 
        </ul>
        <div>
            @else
            <div class="d-flex text-center">
                <a type="button" class="btn btn-info" href=/register>Registrati</a>
                <a type="button" class="btn btn-info mx-4" href=/login>Accedi</a>
            </div>
        </div>
        @endauth
    </div>
    </nav>

    {{ $slot}}

    @livewireScripts
</body>
</html>