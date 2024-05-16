<x-layout title="Registrati">
   <div class="row">
        <div class="col-md-6 mx-auto">
        <h1 class="m-5 text-center">
        Registrati
    </h1>

    <div class="m-5">
        <form action="/register" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}">
                    @error('name')
                        <small class="text-danger">Il nome è obbligatorio</small>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-12">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <small class="text-danger">L'email è obbligatoria</small>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-12">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <small class="text-danger">La password è obbligatoria</small>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-12">
                    <label for="password_confirmation">Conferma password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Registrati</button>
            </div>
        </form>
    </div>
        </div>
   </div>
</x-layout>