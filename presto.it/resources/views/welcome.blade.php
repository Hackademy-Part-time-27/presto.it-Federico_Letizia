<x-layout title="home">

    <h1 class="m-5">Presto.it</h1>
    @auth
    <div class="mx-5 text-center">
        <a type="button" class="btn btn-info" href="{{ route('adv.create') }}">Inserisci Annuncio</a>
    </div>
    @endauth



</x-layout>