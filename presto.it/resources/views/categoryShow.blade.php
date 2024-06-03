<x-layout>
    <div class="container-fluid p-5 text-center bg-gradient bg-info shadow mb-4">
        <div class="row">
            <div class="col-12 fs-1">
                <h1 class="display-2">Esplora la categoria {{$category->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->advs as $adv)
                        <div class="col-12 col-md-4 my-2">
                            <div class="card card-shadow" style="width: 18rem;">
                                <img src="{{!$adv->images()->get()->isEmpty() ? Storage::url($adv->images()->first()->path) : 'https://picsum.photo/200'}}" class="card-img-top p-3 rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title fs-2">{{$adv->title}}</h5>
                                    <p class="card-text">{{$adv->body}}</p>
                                    <p class="card-text fs-3">€ {{$adv->price}}</p>
                                    <a href="{{route('adv.show', $adv)}}" class="btn btn-info shadow">Visualizza</a>
                                    <p class="card-footer my-2">Pubblicato il: {{$adv->created_at->format('d/m/Y')}}</p>
                                    <p class="card-footer my-2">Autore: {{$adv->user->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-12">
                        <div class="h1">Nono ci sono annunci con questa categoria</div>
                        <div class="h2">Pubblicane uno <a href="{{ route('adv.create')}}" class="btn btn-info fs-4 text-white shadow">Crea annuncio</a></div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>