<?php

namespace App\Http\Livewire\Inventario\Producto;

use App\Models\CategoriaProducto;
use App\Models\configuracion\SistemaUnidad;
use App\Models\Inventario\Producto;
use Livewire\Component;

class LwCreate extends Component
{
    public $producto = [];

    public function add()
    {
        $this->validate([
            'producto.nombre' => 'required',
            'producto.color' => 'required',
            'producto.tamaño' => 'required',
            'producto.estado' => 'required',
            'producto.peso' => 'required',
            'producto.costo_produccion' => 'required',
            'producto.cantidad' => 'required',
        ]);
        Producto::create($this->producto);
        return redirect()->route('productos.index');
    }

    public function limpiar()
    {
        $this->producto = [];
    }
    public function render()
    {
        $categorias = CategoriaProducto::all();
        return view('livewire.inventario.producto.lw-create', compact('categorias'));
    }
}
