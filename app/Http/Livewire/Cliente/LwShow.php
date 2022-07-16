<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Cliente;

class LwShow extends Component
{

    public $cliente = [];
    public function mount($id)
    {
        $this->cliente = Cliente::find($id)->toArray();
    }
    public function render()
    {
        return view('livewire.cliente.lw-show');
    }

    public function guardar()
    {
        $this->validate([
            'cliente.nombre' => 'required',

        ]);
        $cliente = Cliente::find($this->cliente['id']);
        $cliente->nombre = $this->cliente['nombre'];
        $cliente->telefono = $this->cliente['telefono'];
        $cliente->direccion = $this->cliente['direccion'];
        $cliente->save();
        Bitacora::Bitacora('U', 'Clientes',  $cliente->id);
        return redirect()->route('clientes.index');
    }
}
