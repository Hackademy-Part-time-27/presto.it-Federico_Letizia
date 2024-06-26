<x-layout>
    <div class="container-fluid text-center bg-info mb-4">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="display-2">Annuncio {{$adv->title}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="card">
            <div id="carouselExample" class="carousel slide">
                    @if ($adv->images)
                    <div class="carousel-inner text-center">
                        @foreach ($adv->images as $image)
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

                <div class="text-center my-3">
                    <h5 class="card-title fs-1">Titolo: {{$adv->title}}</h5>
                    <p class="card-text fs-3">Descrizione: {{$adv->body}}</p>
                    <p class="card-text fs-2">Prezzo: {{$adv->price}}</p>
                    <a href="{{ route('categoryShow', ['category'=>$adv->category])}}" class="my-2 bordered pt-2 btn btn-info my-3">Categoria: {{$adv->category->name}}</a>
                    <p class="card-footer">Pubblicato il: {{$adv->created_at->format('d/m/y')}}</p>
                    <p class="card-footer">Autore: {{$adv->user->name ?? ''}}</p>
                </div>
            </div>
        </div>

    </div>
</x-layout>