<x-layout title="Home">

    <h1 class="m-5 text-center">Presto.it</h1>
    @auth
        <div class="mx-5 text-center">
            <a type="button" class="btn btn-info" href="{{ route('adv.create') }}">Inserisci Annuncio</a>
        </div>
    @endauth

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($advs as $adv)
                <div class="col-12 col-md-4 mt-5 px-5">
                    <div class="card text-center" style="width: 350px;">
                        <img src="https://picsum.photos/200" class="card-img-top shadow" alt="...">
                        <div class="card-body shadow">
                            <h5 class="card-title fs-2">{{ $adv->title }}</h5>
                            <p class="card-text">{{ $adv->body }}</p>
                            <p class="card-text fs-3">{{ $adv->price }}</p>
                            <div class="d-flex">
                                <a href="{{ route('adv.show', $adv) }}" class="btn btn-primary mx-2">Vedi Annuncio</a>
                                <a href="#" class="btn btn-primary mx-3">Categoria: {{ $adv->category? $adv->category->name : 'N/A' }}</a>
                            </div>
                            <p class="card-footer mt-3">pubblicato il: {{ $adv->created_at->format('d/m/y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>