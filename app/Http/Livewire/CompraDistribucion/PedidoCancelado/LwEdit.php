<?php

namespace App\Http\Livewire\CompraDistribucion\PedidoCancelado;

use App\Models\CompraDistribucion\Pedido;
use App\Models\CompraDistribucion\PedidoCancelado;
use Livewire\Component;

class LwEdit extends Component
{
    public $pedido = [];

    public function mount($id)
    {
        $this->pedido = PedidoCancelado::find($id)->toArray();
    }

    public function add()
    {
        $this->validate([
            'pedido.pedido_id' => 'required',
            'pedido.motivo' => 'required',
            'pedido.descripcion' => 'required',
            'pedido.fecha' => 'required',
            'pedido.hora' => 'required',
        ]);
        $pedido = PedidoCancelado::find($this->pedido['id']);
        $pedido->pedido_id = $this->pedido['pedido_id'];
        $pedido->motivo = $this->pedido['motivo'];
        $pedido->descripcion = $this->pedido['descripcion'];
        $pedido->fecha = $this->pedido['fecha'];
        $pedido->hora = $this->pedido['hora'];
        $pedido->save();
        return redirect()->route('pedido-cancelado.index');
    }

    public function limpiar()
    {
        $this->pedido = [];
    }

    public function render()
    {
        $pedidos = Pedido::all();
        return view('livewire.compra-distribucion.pedido-cancelado.lw-edit',compact('pedidos'));
    }
}
