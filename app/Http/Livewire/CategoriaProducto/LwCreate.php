<?php

namespace App\Http\Livewire\CategoriaProducto;

use Livewire\Component;
use App\Models\CategoriaProducto;

class LwCreate extends Component
{
   
    public $categoria_producto = [];

    public function add()
    {
        $this->validate([
            'categoria_producto.nombre' => 'required',
            'categoria_producto.descripcion' => 'required',
        ]);
        CategoriaProducto::create($this->categoria_producto);
        return redirect()->route('categoria_productos.index');
    }

    public function limpiar()
    {
        $this->categoria_producto = [];
    }
    public function render()
    {
        return view('livewire.categoria-producto.lw-create');
    }
    
}
