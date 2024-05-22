<?php

namespace App\Livewire;

use App\Models\Adv;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateAdv extends Component
{
            public $title;
            public $body;
            public $price;
            public $category;


            protected $rules = [
                'title' => 'required',
                'body' => 'required',
                'category' => 'required',
                'price' => 'required|numeric',
            ];

    public function store()
        {
            $this->validate();

            $category = Category::find($this->category);
            $adv = $category->advs()->create ([
                'title'=>$this->title,
                'body'=>$this->body,
                'price'=>$this->price,
                'user_id'=>Auth::user()->id,
            ]);

           

            session()->flash('message', 'Annuncio inserito con successo');

            $this->reset(['title', 'body','category', 'price']);
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
