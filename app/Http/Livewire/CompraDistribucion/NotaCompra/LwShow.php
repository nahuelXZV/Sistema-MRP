<?php

namespace App\Http\Livewire\CompraDistribucion\NotaCompra;

use App\Models\CompraDistribucion\NotaCompra;
use App\Models\CompraDistribucion\Proveedor;
use App\Models\DetalleCompra;
use Livewire\Component;

class LwShow extends Component
{
    public $dnota;
    public $nota = [];
    public function mount($id)
    {
        $this->nota = NotaCompra::find($id)->toArray();
    }

    public function delete($id)
    {
        $detalle = DetalleCompra::find($id);
        $detalle->delete();
    }

    public function render()
    {
        $detalles = DetalleCompra::where('nota_compras_id', $this->nota['id'])->get();
        $proveedores = Proveedor::all();
        return view('livewire.compra-distribucion.nota-compra.lw-show',compact('proveedores','detalles'));
    }
}
