<?php

namespace App\Http\Livewire\CompraDistribucion\Distribuidor;

use App\Models\Bitacora;
use App\Models\CompraDistribucion\Distribuidor;
use Livewire\Component;

class LwEdit extends Component
{

    public $distribuidor = [];

    public function mount($id)
    {
        $dis = Distribuidor::find($id);
        $this->distribuidor['id'] = $dis->id;
        $this->distribuidor['nombre'] = $dis->nombre;
        $this->distribuidor['telefono'] = $dis->telefono;
        $this->distribuidor['direccion'] = $dis->direccion;
        $this->distribuidor['email'] = $dis->email;
        $this->distribuidor['tipo'] = $dis->tipo;
        $this->distribuidor['medio_transporte'] = $dis->medio_transporte;
    }

    public function add()
    {
        $this->validate([
            'distribuidor.nombre' => 'required',
            'distribuidor.telefono' => 'required',
            'distribuidor.direccion' => 'required',
            'distribuidor.email' => 'required',
            'distribuidor.tipo' => 'required',
            'distribuidor.medio_transporte' => 'required',
        ]);
        $distribuidor = Distribuidor::find($this->distribuidor['id']);
        $distribuidor->update($this->distribuidor);
        Bitacora::Bitacora('U', 'Distribuidores', $distribuidor->id);
        return redirect()->route('distribuidores.index');
    }

    public function render()
    {
        return view('livewire.compra-distribucion.distribuidor.lw-edit');
    }
}
