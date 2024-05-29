<x-layout>
    <div class="container-fluid text-center bg-info mb-4">
        <div class="">
            <div class="col-12 p-5">
                <h1 class="display-2">Tutti gli Annunci</h1>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @forelse ($advs as $adv)
                    <div class="col-12 col-md-4 my-4">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="{{!$adv->images()->get()->isEmpty() ? $adv->images()->first()->getUrl(400,300) : 'https://static.wixstatic.com/media/91a6c3_f478a2fe11f54d9fa489f4f9735d72ca~mv2.png/v1/fill/w_560,h_168,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Utkast-11-3.png'}}" class="card-img-top p-3 rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $adv->title }}</h5>
                                <p class="card-text">{{ $adv->body }}</p>
                                <p class="card-text">{{ $adv->price }}</p>
                                <a href="{{ route('adv.show', compact('adv')) }}" class="btn btn-info shadow mb-3">Visualizza</a><br>
                                <a href="{{ route('categoryShow',['category'=>$adv->category])}}" class="mb-3 border-top pt-2 shadow btn btn-info">Categoria: {{$adv->category->name}}</a>
                                <p class="card-footer mb-3">Pubblicato il: {{$adv->created_at->format('d/m/y')}}</p>
                                <p class="card-footer">Autore: {{$adv->user->name ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning py-3 shadow">
                                <h4 class="text-center">Non ci sono annunci</h4>
                            </div>
                        </div>
                @endforelse
                 
                </div>
            </div>
        </div>
    </div>
    
    <div class="container d-flex justify-content-center">
    <div class="text-center m-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    {{ $advs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>