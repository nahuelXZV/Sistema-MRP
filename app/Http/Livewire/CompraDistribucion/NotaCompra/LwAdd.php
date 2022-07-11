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
            'detalle.cantidad' => 'required|min:0',
            'detalle.costo' => 'required',
        ]);
        $this->detalle['nota_compras_id'] = $this->nota->id;
        DetalleCompra::create($this->detalle);

        //Aumentamos el stock de la materia prima
        $materia = MateriaPrima::find($this->detalle['materia_primas_id']);
        $materia->cantidad += $this->detalle['cantidad'];
        $materia->update();
        //Actualizamos el coto_total de la nota de compra
        $detalles = DetalleCompra::where('nota_compras_id', $this->nota->id)->get();
        $total = 0;
        foreach ($detalles as $detalle) {
            $total = $total + intval($detalle->costo);
        }
        $nota = NotaCompra::find($this->nota->id);
        $nota->costo_total = strval($total);
        $nota->save();

        return redirect()->route('nota-compra.show',$this->nota->id);
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
