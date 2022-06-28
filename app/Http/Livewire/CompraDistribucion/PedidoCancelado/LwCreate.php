<?php

namespace App\Http\Livewire\CompraDistribucion\PedidoCancelado;

use App\Models\CompraDistribucion\Pedido;
use App\Models\CompraDistribucion\PedidoCancelado;
use Livewire\Component;

class LwCreate extends Component
{
    public $pedido = [];

    public function add()
    {
        $this->validate([
            'pedido.pedido_id' => 'required',
            'pedido.motivo' => 'required',
            'pedido.descripcion' => 'required',
            'pedido.fecha' => 'required',
            'pedido.hora' => 'required',
        ]);
        $pedido = PedidoCancelado::create($this->pedido);
        
        return redirect()->route('pedido-cancelado.index');
    }

    public function limpiar()
    {
        $this->pedido = [];
    }

    public function render()
    {
        $pedidos = Pedido::all();
        return view('livewire.compra-distribucion.pedido-cancelado.lw-create',compact('pedidos'));
    }
}
