<x-layout>
    <div class="container-fluid bg-info shadow">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2">
                    {{$adv_to_check? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}
                </h1>
            </div>
        </div>
    </div>
    @if ($adv_to_check)
        <div class="container text-center mt-5">
            <div class="row">
                <div class="col-12 card">
                    <h5 class="card-title mt-3">Titolo: {{$adv_to_check->title}}</h5>
                    <p class="card-text mt-2">Descrizione: {{$adv_to_check->body}}</p>
                    <p class="card-footer mt-2">Pubblicato il: {{$adv_to_check->created_at->format('d/m/y')}}
                    <p class="card-footer">Autore: {{$adv->user->name ?? ''}}</p>
                    </p>
                    <div class="d-flex">
                        <div class="">
                            <form action="{{ route('revisor.accept_adv', ['adv' => $adv_to_check])}}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                    <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                        </div>
                        <div class="col-12">
                            <form action="{{ route('revisor.reject_adv', ['adv' => $adv_to_check])}}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-layout>