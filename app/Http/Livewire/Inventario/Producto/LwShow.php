<?php

namespace App\Http\Livewire\Inventario\Producto;

use App\Models\Inventario\Producto;
use Livewire\Component;

class LwShow extends Component
{
    public $producto = [];
    public function mount($id)
    {
        $this->producto = Producto::find($id)->toArray();
    }
    public function render()
    {
        return view('livewire.inventario.producto.lw-show');
    }
}
