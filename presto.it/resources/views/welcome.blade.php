<x-layout title="Home">

    <h1 class="m-5 text-center display-2">
        <img src="https://static.wixstatic.com/media/91a6c3_f478a2fe11f54d9fa489f4f9735d72ca~mv2.png/v1/fill/w_560,h_168,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Utkast-11-3.png" class="img-fluid" alt=""> 
    </h1>
                @if (session()->has('message'))
                    <div class="alert alert-success text-center m-5">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif

    <div class="text-center display-2 mb-3">
        {{__('ui.allAdv') }}
    </div>

    @auth
        <div class="mx-5 text-center">
            <a type="button" class="btn btn-info fs-5 mb-3 shadow" href="{{ route('adv.create') }}">Inserisci Annuncio</a>
        </div>
    @endauth

    <div class="container">
        <div class="row">
            @foreach ($advs as $adv)
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <div class="card text-center my-3" style="width: 18rem; height: auto;">
                        <img src="{{!$adv->images()->get()->isEmpty() ? $adv->images()->first()->getUrl(400,300) : 'https://static.wixstatic.com/media/91a6c3_f478a2fe11f54d9fa489f4f9735d72ca~mv2.png/v1/fill/w_560,h_168,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Utkast-11-3.png'}}" class="card-img-top p-3 rounded" style="width: 400; height:250px; 300;" alt="...">
                        <div class="card-body shadow">
                            <h5 class="card-title fs-2">{{ $adv->title }}</h5>
                            <p class="card-text">{{ $adv->body }}</p>
                            <p class="card-text fs-3">€ {{ $adv->price }}</p>
                            <div class=" container-fluid">
                                <a href="{{ route('adv.show', $adv) }}" class="btn btn-info mb-3">Vedi Annuncio</a>
                                <a href="{{ route('categoryShow', ['category'=>$adv->category])}}" class="btn btn-info mx-3">Categoria: {{$adv->category->name}}</a>
                            </div>
                            <p class="card-footer mt-3">pubblicato il: {{ $adv->created_at->format('d/m/y') }}</p>
                            <p class="card-footer">Autore: {{$adv->user->name ?? ''}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

                

    <footer>
        <div class="container-fluid mt-4 bg-dark text-light sticky-bottom">
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-3">
                    <p>Presto.it</p>
                    <p class="mb-4">Vuoi lavorare con noi?</p>
                    <p>Registrati <br> clicca qui per mandare la richiesta</p>
                    <a href="{{ route('become.revisor') }}" class="fs-4 btn btn-info text-light shadow mb-4">Diventa Revisore</a>
                </div>
            </div>
        </div>
    </footer>
</x-layout>