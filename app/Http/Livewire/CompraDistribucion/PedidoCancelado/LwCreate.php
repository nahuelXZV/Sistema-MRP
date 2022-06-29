<?php

namespace App\Http\Livewire\CompraDistribucion\PedidoCancelado;

use App\Models\CompraDistribucion\Pedido;
use App\Models\CompraDistribucion\PedidoCancelado;
use App\Models\DetallePedido;
use App\Models\Inventario\Producto;
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
        $p = Pedido::find($this->pedido['pedido_id']);
        $p->estado = 'Cancelado';
        $p->save();

        $dpedidos = DetallePedido::where('pedido_id', $p->id)->get();
        if ($p->estado <> 'Pendiente') {
            foreach ($dpedidos as $pedido) {
                $cantidadP = $pedido->cantidad;
                $producto = Producto::find($pedido->producto_id);
                $producto->cantidad += $cantidadP;      //Aumentamos el stock del producto
                $producto->update();
                $pedido->update();
            }
        }

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
