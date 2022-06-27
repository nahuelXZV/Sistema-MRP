<?php

namespace App\Http\Livewire\CompraDistribucion\NotaCompra;

use App\Models\CompraDistribucion\NotaCompra;
use App\Models\CompraDistribucion\Proveedor;
use App\Models\DetalleCompra;
use Livewire\Component;

class LwEdit extends Component
{
    public $nota = [];

    public function mount($id)
    {
        $this->nota = NotaCompra::find($id)->toArray();
    }

    public function add()
    {
        $this->validate([
            'nota.fecha' => 'required',
            'nota.hora' => 'required',
            'nota.costo_total' => 'required'
        ]);
        $nota = NotaCompra::find($this->nota['id']);
        $nota->fecha = $this->nota['fecha'];
        $nota->hora = $this->nota['hora'];
        $nota->costo_total = $this->nota['costo_total'];
        if ($this->nota['proveedor_id']) {
            $nota->proveedor_id = $this->nota['proveedor_id'];
        }
        $nota->save();
        return redirect()->route('nota-compra.index');
    }

    public function limpiar()
    {
        $this->nota = [];
    }

    public function render()
    {
        $detalles = DetalleCompra::all();
        $proveedores = Proveedor::all();
        return view('livewire.compra-distribucion.nota-compra.lw-edit',compact('proveedores','detalles'));
    }
}
