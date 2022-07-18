<?php

namespace App\Http\Livewire\Inventario\BomProducto;

use App\Models\Bitacora;
use App\Models\Inventario\BonProducto;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use Livewire\Component;

class LwCreate extends Component
{
    public $producto;
    public $name;
    public $materias_primas;
    public $cantidad;
    public $estado;

    public function mount($id)
    {
        $this->producto = Producto::find($id);
        $this->name = $this->producto->nombre;
    }

    public function add()
    {
        $this->validate([
            'materias_primas' => 'required',
            'cantidad' => 'required',
            'estado' => 'required',
        ]);
        $bom = BonProducto::create([
            'producto_id' => $this->producto->id,
            'materia_prima_id' => $this->materias_primas,
            'cantidad' => $this->cantidad,
            'estado' => $this->estado,
        ]);
        Bitacora::Bitacora('C', 'BOM Producto', $bom->id);
        return redirect()->route('productos.show', $this->producto->id);
    }


    public function limpiar()
    {
        $this->materias_primas = null;
        $this->cantidad = null;
    }

    public function render()
    {
        $materias = MateriaPrima::all();
        return view('livewire.inventario.bom-producto.lw-create', compact('materias'));
    }
}
