<?php

namespace App\Http\Livewire\Inventario\Procesos;

use App\Models\Bitacora;
use App\Models\Inventario\Producto;
use App\Models\ProcesoProducto;
use App\Models\Produccion\Maquinaria;
use App\Models\Produccion\Proceso;
use Livewire\Component;

class LwCreate extends Component
{
    public $producto;
    public $name;
    public $proceso;

    public function mount($id)
    {
        $this->producto = Producto::find($id);
        $this->name = $this->producto->nombre;
    }

    public function add()
    {
        $this->validate([
            'proceso' => 'required',
            'name' => 'required',
        ]);
        $proceso = ProcesoProducto::create([
            'producto_id' => $this->producto->id,
            'proceso_id' => $this->proceso,
        ]);
        Bitacora::Bitacora('C', 'Proceso de producto', $proceso->id);
        return redirect()->route('productos.show', $this->producto->id);
    }


    public function limpiar()
    {
        $this->proceso = null;
    }

    public function render()
    {
        $procesos = Proceso::all();
        $maquinarias = Maquinaria::all();
        return view('livewire.inventario.procesos.lw-create', compact('procesos', 'maquinarias'));
    }
}
