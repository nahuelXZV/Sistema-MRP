<?php

namespace App\Http\Livewire\CompraDistribucion\Pedidos;

use App\Models\CompraDistribucion\Pedido;
use App\Models\DetalleCompra;
use App\Models\DetallePedido;
use Livewire\Component;

class LwShow extends Component
{
    public $pedido;
    public $datos = [];

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        $this->datos['cliente'] = $this->pedido->cliente->nombre;
        if ($this->pedido->distribuidor) {
            $this->datos['distribuidor'] = $this->pedido->distribuidor;
        } else {
            $this->datos['distribuidor'] = 'No Asignado';
        }
        $this->datos['fecha'] = $this->pedido->fecha;
        $this->datos['hora'] = $this->pedido->hora;
        $this->datos['descripcion'] = $this->pedido->descripcion;
        $this->datos['estado'] = $this->pedido->estado;
    }
    public function render()
    {
        $dpedidos = DetallePedido::where('pedido_id', $this->pedido->id)->get();
        return view('livewire.compra-distribucion.pedidos.lw-show', compact('dpedidos'));
    }
}
