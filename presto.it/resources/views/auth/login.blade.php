<x-layout title="Accedi">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="mt-5 text-center">Accedi con il tuo account</h1>
        </div>
    <</div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        

    <div class="m-5">
        <form action="/login" method="post">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <small class="text-danger"></small>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-12">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <small class="text-danger"></small>
                    @enderror
                </div>
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Accedi</button>
            </div>
        </form>
    </div>
</x-layout>