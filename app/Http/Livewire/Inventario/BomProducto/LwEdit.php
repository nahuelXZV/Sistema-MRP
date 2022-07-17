<?php

namespace App\Http\Livewire\Inventario\BomProducto;

use App\Models\Bitacora;
use App\Models\Inventario\BonProducto;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use Livewire\Component;

class LwEdit extends Component
{
    public $producto;
    public $name;
    public $materia;
    public $cantidad;
    public $bom;
    public $estado;

    public function mount($id, $idbom)
    {
        $this->bom = $idbom;
        $this->producto = Producto::find($id);
        $bom = BonProducto::find($idbom);
        $this->cantidad = $bom->cantidad;
        $this->materia = MateriaPrima::find($bom->materia_prima_id)->nombre;
        $this->name = $this->producto->nombre;
        $this->estado = $bom->estado;
    }

    public function edit()
    {
        $this->validate([
            'cantidad' => 'required',
            'estado' => 'required',
        ]);
        $bom = BonProducto::find($this->bom);
        $bom->cantidad = $this->cantidad;
        $bom->estado = $this->estado;
        $bom->save();
        Bitacora::Bitacora('U', 'BOM Producto', $bom->id);
        return redirect()->route('productos.show', $this->producto->id);
    }

    public function limpiar()
    {
        $this->cantidad = null;
    }

    public function render()
    {
        return view('livewire.inventario.bom-producto.lw-edit');
    }
}
