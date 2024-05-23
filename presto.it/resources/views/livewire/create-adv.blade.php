<div>
    <div class="mt-5 m-5">
            <h1 class="text-center mb-5">Crea Annuncio</h1> 
            
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif

            <form wire:submit.live="store" class="mt-5" >
                @csrf

                <div class="form-group fs-3">
                    <label for="title">Titolo:</label>
                    <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" >
                </div>
                @error('title')
                    <small class="text-danger">{{$message}}</small> 
                @enderror

                

                <div class="form-group fs-4 mt-3">
                    <label for="body">Descrizione:</label>
                    <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror" rows="3">{{ old('body') }} </textarea>
                </div>
                @error('body')
                    <small class="text-danger">{{$message}}</small>
                @enderror


                <div class="form-group fs-4 mt-3">
                    <label for="price">Prezzo:</label>
                    <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">{{ old('price') }} </input>
                </div>
                @error('price')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div class="form-group fs-4 mt-3">
                    <label for="category">Categoria</label>
                    <select wire:model.defer="category" id="category" class="form-control">
                        <option>Seleziona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div>

                    <button type="submit" class="btn btn-info mt-3 fs-5">Crea Annuncio</button>

                </div>
            </form>
            </div>
            
    </div>
</div>
