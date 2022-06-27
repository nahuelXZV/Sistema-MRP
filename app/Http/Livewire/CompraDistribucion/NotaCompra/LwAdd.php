<?php

namespace App\Http\Livewire\CompraDistribucion\NotaCompra;

use App\Models\CompraDistribucion\NotaCompra;
use App\Models\DetalleCompra;
use App\Models\Inventario\MateriaPrima;
use Livewire\Component;

class LwAdd extends Component
{
    public $detalle = [];
    public $nota;

    public function mount($id)
    {
        $this->nota = NotaCompra::find($id);
    }

    public function add()
    {
        $this->validate([
            'detalle.materia_primas_id'=>'required',
            'detalle.cantidad' => 'required',
            'detalle.costo' => 'required',
        ]);
        $this->detalle['nota_compras_id'] = $this->nota->id;
        DetalleCompra::create($this->detalle);
        return redirect()->route('nota-compra.show',$this->nota);
    }

    public function limpiar()
    {
        $this->detalle = [];
    }

    public function render()
    {
        $materias = MateriaPrima::all();
        return view('livewire.compra-distribucion.nota-compra.lw-add',compact('materias'));
    }
}
