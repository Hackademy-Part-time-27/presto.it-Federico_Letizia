<?php

namespace App\Livewire;

use App\Models\Adv;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateAdv extends Component
{
            use WithFileUploads;

            public $title;
            public $body;
            public $price;
            public $category;
            public $temporary_images;
            public $images = [];



            protected $rules = [
                'title' => 'required',
                'body' => 'required',
                'category' => 'required',
                'price' => 'required|numeric',
                'images.*' => 'image|max:1024',
                'temporary_images.*' => 'image|max:1024'
            ];

            protected $messages = [
                'temporary_images.*.images' => 'i file devono essere immagini',
                'temporary_images.*.max' => 'L\'immagine deve essere massimo 1mb',
            ];


    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024'
        ])) {
            foreach ($this->temporary_images as $image)
            {
                $this->images[] = $image;
            }
        }
    }

    public function removeImages($key)
    {
        if (in_array($key, array_keys($this->images)))
        {
            unset($this->images[$key]);
        }
    }

    public function store()
        {
            $this->validate();

            $this->adv = Category::find($this->category)->advs()->create($this->validate());
            if(count($this->images))
            {
                foreach ($this->images as $image)
                {
                    $this->adv->images()->create(['path' => $image->store('images', 'public')]);
                }
            }

            $this->adv->user()->associate(Auth::user());
            $this->adv->save();
      

           /* $category = Category::find($this->category);
            $adv = $category->advs()->create ([
                'title'=>$this->title,
                'body'=>$this->body,
                'price'=>$this->price,
                'user_id'=>Auth::user()->id,
            ]);*/


           

            session()->flash('message', 'Annuncio inserito con successo');

            $this->reset(['title', 'body','category', 'price', 'temporary_images', 'images']);
        }

    public function updated($rules)
    {
        $this->validateOnly($rules);
    }
    


    public function render()
    {
        return view('livewire.create-adv');
    }
}
