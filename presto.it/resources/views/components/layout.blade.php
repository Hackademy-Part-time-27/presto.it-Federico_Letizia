<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{$title ?? 'Presto.it'}}</title>
    <style>
        body{
            background-color: #87cefa;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-primary-subtle sticky-top">
    <div class="container-fluid">
        <img src="images/Presto_logo.png" alt="">
        <a class="navbar-brand fs-1" href="/">
            <img src="https://static.wixstatic.com/media/91a6c3_f478a2fe11f54d9fa489f4f9735d72ca~mv2.png/v1/fill/w_560,h_168,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Utkast-11-3.png" style="width: 200px;
            height: auto;" class="img-fluid" alt="Presto.it Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-flex align-items-center justify-content-center">
            <li class="nav-item mx-1">
            <a class="nav-link fs-5 hover ms-3" href="#">Contatti</a>
            </li>
            <li class="nav-item mx-1">
            <a class="nav-link fs-5 hover text-center" href="#">Chi siamo</a>
            </li>
            <li class="nav-item mx-1">
            <a class="nav-link fs-5 hover text-center" href="{{route('adv.index')}}">Tutti gli Annunci</a>
            </li>
            <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle fs-5 hover" href="#" id="categoriesDrop" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDrop">
                @foreach ($categories as $category)
                <li><a class="dropdown-item fs-5 hover" href="{{ route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
                @endforeach
            </li>
        </ul>
        </div>


        <form action="{{ route('adv.search') }}" method="get" class="d-flex mx-2">
            <input  name="searched" class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search">
            <button type="submit" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>



        @auth
        <ul class="navbar-nav ms-auto dropdown-menu-end bg-primary-subtle text-end">          
            <li class=" nav-item dropdown dropdown-menu-end text-end">
                <a class="nav-link bg-info rounded text-end text-white dropdown-toggle fs-5 font-weight-bold dropdown-menu-end" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}</a>


                <ul class="dropdown-menu dropdown-menu-end text-center ms-auto" aria-labelledby="dropdownMenuButton">
                    <li><a class="nav-link btn btn-info" href="{{ route('adv.create') }}">Crea Annuncio</a></li> 
                    @if (Auth::user()->is_revisor)
                        <li class="MT-2">
                            <a href="{{ route('revisor.index') }}" 
                                class="nav-link btn btn-info">Da Revisionare 
                                <div class="bg-danger rounded-circle text-white mx-5">{{ App\Models\Adv::toBeRevisionedCount() }}</div>
                            </a>
                        </li>
                    @endif

                    <li><hr class="dropdown-divider"></a></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class=" bg-danger-subtle px-4">Esci</button>
                        </form>
                    </li> 
                </ul>
            
            </li> 
        </ul>
        @else
        <div>    
            <div class="d-flex text-center">
                <a type="button" class="btn btn-light hover m-2" href=/register>Registrati</a>
                <a type="button" class="btn btn-light hover m-2" href=/login>Accedi</a>
            </div>
        </div>
        @endauth
        <div class="justify-content-center">
            <div>
                <x-_locale Lang="it" />
            </div>
            <div>
                <x-_locale Lang="en" />
            </div>
            <div>
                <x-_locale Lang="es" />
            </div>
        </div>
    </div>
    </nav>

    {{ $slot}}

    @livewireScripts
</body>
</html>