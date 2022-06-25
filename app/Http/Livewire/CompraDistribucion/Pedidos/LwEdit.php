<?php

namespace App\Http\Livewire\CompraDistribucion\Pedidos;

use App\Models\Bitacora;
use App\Models\CompraDistribucion\Distribuidor;
use App\Models\CompraDistribucion\Pedido;
use Livewire\Component;

class LwEdit extends Component
{
    public $pedido;
    public $datos = [];

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        $this->datos['cliente'] = $this->pedido->cliente->nombre;
        if ($this->pedido->distribuidor) {
            $this->datos['distribuidor'] = $this->pedido->distribuidor->nombre;
        } else {
            $this->datos['distribuidor'] = 'No Asignado';
        }
        $this->datos['fecha'] = $this->pedido->fecha;
        $this->datos['hora'] = $this->pedido->hora;
        $this->datos['descripcion'] = $this->pedido->descripcion;
    }

    public function update()
    {
        $this->validate([
            'pedido.fecha' => 'required',
            'pedido.descripcion' => 'required',
        ]);
        if ($this->datos['distribuidor'] == '') {
            $this->pedido->distribuidor_id = $this->datos['distribuidor'];
        }
        $this->pedido->fecha = $this->datos['fecha'];
        $this->pedido->hora = $this->datos['hora'];
        $this->pedido->descripcion = $this->datos['descripcion'];
        $this->pedido->save();
        Bitacora::Bitacora('U', 'Pedido', $this->pedido->id);
        return redirect()->route('pedidos.add', $this->pedido->id);
    }

    public function limpiar()
    {
        $this->datos = [];
    }

    public function render()
    {
        $distribuidoras = Distribuidor::all();
        return view('livewire.compra-distribucion.pedidos.lw-edit', compact('distribuidoras'));
    }
}
