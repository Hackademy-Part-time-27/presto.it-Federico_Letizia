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
                            <img src="{{ $image->getUrl(400,300) }}" class="img-fluid p-3 rounded">
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
                <div>
                    <h5 class="card-title mt-3">Titolo: {{$adv_to_check->title}}</h5>
                    <p class="card-text mt-2">Descrizione: {{$adv_to_check->body}}</p>
                    <p class="card-text mt-2">Pubblicato il: {{$adv_to_check->created_at->format('d/m/y')}}
                    <p class="card-footer">Autore: {{ $adv_to_check->user->name }}</p>
                </div>

                    <h5 class="mt-3 ">Tags</h5>
                    
                <div>
                    <span class="p-2 justify-content-center mb-3 bordered border-bottom border-dark">
                        @if ($image->labels)
                            @foreach ($image->labels as $label)
                                <p class="d-inline">{{$label}},  </p>
                            @endforeach
                        @endif
                    </span>
                </div>

                        <div>   
                            <h5 class="mt-4">Revisione immagini</h5>

                            <div class="card-body d-flex justify-content-center text-center">
                             
                                <p>Adulti <br><span class="{{$image->adult}} mx-5"></span></p>
                                <p>Satira <br><span class="{{$image->spoof}} mx-5"></span></p>
                                <p>Medicina <br><span class="{{$image->medical}} mx-5"></span></p>
                                <p>Violenza <br><span class="{{$image->violence}} mx-5"></span></p>
                                <p>Contenuto ammiccante <br><span class="{{$image->racy}} mx-5"></span></p>
                            </div>
                        </div>
                </div>
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