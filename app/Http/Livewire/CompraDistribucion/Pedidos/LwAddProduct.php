<?php

namespace App\Http\Livewire\CompraDistribucion\Pedidos;

use App\Models\CompraDistribucion\Pedido;
use App\Models\DetallePedido;
use App\Models\Inventario\Producto;
use Livewire\Component;

class LwAddProduct extends Component
{
    public $pedido;
    public $producto = [];
    public $cliente;
    public $distribuidor;

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        $this->cliente = $this->pedido->cliente->nombre;
        if ($this->pedido->distribuidor) {
            $this->distribuidor = $this->pedido->distribuidor->nombre;
        } else {
            $this->distribuidor = 'No Asignado';
        }
    }

    public function add()
    {
        $this->validate([
            'producto.producto_id' => 'required',
            'producto.cantidad' => 'required|min:0',
        ]);
        $this->producto['pedido_id'] = $this->pedido->id;
        DetallePedido::create($this->producto);
        $this->producto = [];
        $this->render();
    }

    public function finalizar()
    {
        return redirect()->route('pedidos.index');
    }

    public function delete($id)
    {
        $dpedido = DetallePedido::find($id);
        $dpedido->delete();
    }

    public function limpiar()
    {
        $this->producto = [];
    }

    public function render()
    {
        $dpedidos = DetallePedido::where('pedido_id', $this->pedido->id)->get();
        $productos = Producto::all();
        return view('livewire.compra-distribucion.pedidos.lw-add-product', compact('productos', 'dpedidos'));
    }
}
