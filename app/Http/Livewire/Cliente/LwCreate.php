<?php

namespace App\Http\Livewire\Cliente;


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
        Cliente::create($this->cliente);
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
