<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;


class CategoryFilter extends Component
{
    // Cuando cargamos la paginación sea dinámico
    use WithPagination;

    // Definimos las propiedades
    public $category, $subcategoria, $marca;

    // Para mostrar los productos en Grid o lista
    public $view = "grid";

    // Para restablecer los filtros de busqueda
    public function limpiar(){
        $this->reset(['subcategoria', 'marca', 'page']);
    }

    public function render(){

        // Recuperamos la relación de los productos que esten publicados (2) y un filtro de 20 productos por page
       /* $products = $this->category->products()
                            ->where('status', 2)->paginate(20);*/

        $productsQuery = Product::query()->whereHas('subcategory.category', function (Builder $query){
            $query->where('id',$this->category->id);
        });

        if ($this->subcategoria) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }


        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }


}
