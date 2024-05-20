<x-layout>
    <div class="container-fluid text-center bg-info mb-4">
        <div class="">
            <div class="col-12 p-5">
                <h1 class="display-2">Annunci</h1>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <div class="row">
                @foreach ($advs as $adv)
                    <div class="col-12 col-md-4 my-4">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="https://picsum.photos/200" class="card-img-top rounded" alt="...">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container justify-content-center">
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