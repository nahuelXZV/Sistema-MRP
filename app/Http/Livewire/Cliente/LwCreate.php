<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Cliente;


class LwCreate extends Component
{
    public $cliente = [];

    public function add()
    {
        $this->validate([
            'cliente.nombre' => 'required',
            'cliente.telefono' => 'required',
            'cliente.direccion' => 'required',
        ]);
        $cliente = Cliente::create($this->cliente);
        Bitacora::Bitacora('C', 'Clientes', $cliente->id);
        return redirect()->route('clientes.index');
    }

    public function limpiar()
    {
        $this->cliente = [];
    }
    public function render()
    {
        $clientes = Cliente::all();
        return view('livewire.cliente.lw-create', compact('clientes'));
    }
}
