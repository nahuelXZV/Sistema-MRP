<?php

namespace App\Http\Livewire\CompraDistribucion\Pedidos;

use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\CompraDistribucion\Distribuidor;
use App\Models\CompraDistribucion\Pedido;
use Livewire\Component;

class LwCreate extends Component
{
    public $pedido = [];

    public function add()
    {
        $this->validate([
            'pedido.cliente_id' => 'required',
            'pedido.descripcion' => 'required',
            'pedido.fecha' => 'required',
            'pedido.direccion' => 'required',
        ]);
        $this->pedido['estado'] = 'Pendiente';
        $this->pedido['hora'] = now();
        $pedido = Pedido::create($this->pedido);
        Bitacora::Bitacora('C', 'Pedido', $pedido->id);
        return redirect()->route('pedidos.add', $pedido->id);
    }

    public function limpiar()
    {
        $this->pedido = [];
    }

    public function render()
    {
        $clientes = Cliente::all();
        $distribuidoras = Distribuidor::all();
        return view('livewire.compra-distribucion.pedidos.lw-create', compact('clientes', 'distribuidoras'));
    }
}
