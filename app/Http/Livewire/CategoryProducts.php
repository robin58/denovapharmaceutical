<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $products = [];

    public function loadPosts(){
        $this->products = $this->category->products()->where('status',2)->take(15)->get();

        // Event para controlar el desfase al inicio de la carga de la web
        $this->emit('glider', $this->category->id);
    }
    public function render(){
        return view('livewire.category-products');
    }
}
