<x-layout>

    @if ($adv_to_check)
        <div class="container-fluid p-5 text-center bg-gradient bg-info shadow mb-4">
            <div class="row">
                <div class="col-12 fs-1 text-center">
                    <h1 class="display-2">Ecco L'annuncio da Revisionare</h1>
                </div>
            </div>
        </div>

        <div class="container text-center mt-5">
            
            <div class="row">
                <div class="col-12 card bg-info-subtle">

                <div id="carouselExample" class="carousel slide">
                    @if ($adv_to_check->images)
                    <div class="carousel-inner">
                        @foreach ($adv_to_check->images as $image)
                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{ Storage::url ($image->path) }}" class="img-fluid p-3 rounded">
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                    @endif
                    <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                    <h5 class="card-title mt-3">Titolo: {{$adv_to_check->title}}</h5>
                    <p class="card-text mt-2">Descrizione: {{$adv_to_check->body}}</p>
                    <p class="card-text mt-2">Pubblicato il: {{$adv_to_check->created_at->format('d/m/y')}}
                    <p class="card-footer">Autore: {{ $adv_to_check->user->name }}</p>
                    </p>
                    <div class="row">          
                        <div class="col-12 col-md-6 text-center">
                            <form action="{{ route('revisor.accept_adv', ['adv' => $adv_to_check])}}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                    <button type="submit" class="btn btn-success fs-5">Accetta</button>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 text-center mb-3">
                            <form action="{{ route('revisor.reject_adv', ['adv' => $adv_to_check])}}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                    <button type="submit" class="btn btn-danger fs-5">Rifiuta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid p-5 text-center bg-gradient bg-info shadow mb-4">
            <div class="row">
                <div class="col-12 fs-1 text-center">
                    <h1 class="display-2">Non ci sono Annunci da Revisionare</h1>
                </div>
            </div>
        </div>
    @endif
</x-layout>