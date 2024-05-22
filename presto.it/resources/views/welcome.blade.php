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
                                <a href="{{ route('categoryShow', ['category'=>$adv->category])}}" class="btn btn-primary mx-3">Categoria: {{$adv->category->name}}</a>
                            </div>
                            <p class="card-footer mt-3">pubblicato il: {{ $adv->created_at->format('d/m/y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

                @if (session()->has('message'))
                    <div class="alert alert-success text-center m-5">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif

    <footer>
        <div class="container-fluid mt-4 bg-dark text-light position-fixed">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <p>Presto.it</p>
                    <p>Vuoi lavorare con noi?</p>
                    <p>Registrati e clicca qui</p>
                    <a href="{{ route('become.revisor') }}" class="fs-4 btn btn-warning text-light shadow my-3">Diventa Revisore</a>
                </div>
            </div>
        </div>
    </footer>
</x-layout>