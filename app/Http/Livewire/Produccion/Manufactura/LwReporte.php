<?php

namespace App\Http\Livewire\Produccion\Manufactura;

use App\Models\CompraDistribucion\Pedido;
use App\Models\Produccion\Mps;
use App\Models\Produccion\Problema;
use Livewire\Component;

class LwReporte extends Component
{
    public $mps;
    public $pedidos;

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        $this->mps = Mps::where('pedido_id', $id)->first();
    }

    public function render()
    {
        $reportes = Problema::where('mps_id', $this->mps->id)->get();
        return view('livewire.produccion.manufactura.lw-reporte', compact('reportes'));
    }
}
