<?php

namespace App\Http\Livewire\CategoriaProducto;

use App\Models\CategoriaProducto;
use Livewire\Component;

class LwShow extends Component
{
   
    public $categoria_producto = [];
    public function mount($id)
    {
        $this->categoria_producto = CategoriaProducto::find($id)->toArray();
    }
    public function render()
    {
        return view('livewire.categoria-producto.lw-show');
    }
    
    public function guardar(){
        $this->validate(['categoria_producto.nombre' => 'required',    
    ]);
    $categoria_producto = CategoriaProducto::find($this->categoria_producto['id']);
    $categoria_producto->nombre = $this->categoria_producto['nombre'];
    $categoria_producto->descripcion = $this->categoria_producto['descripcion'];
    $categoria_producto->save();
    return redirect()->route('categoria_productos.index');
    }
}
