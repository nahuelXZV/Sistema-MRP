<?php

namespace App\Http\Livewire\CategoriaProducto;

use App\Models\Bitacora;
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
        $cat = CategoriaProducto::create($this->categoria_producto);
        Bitacora::Bitacora('C', 'Categoria productos', $cat->id);
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
