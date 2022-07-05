<?php

namespace App\Http\Livewire\CompraDistribucion\Distribuidor;

use Livewire\Component;
use App\Models\CompraDistribucion\Distribuidor;

class LwCreate extends Component
{

    public $distribuidor = [];

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
        Distribuidor ::create($this->distribuidor);
        return redirect()->route('distribuidores.index');
    }

    public function limpiar()
    {
        $this->distribuidor = [];
    }

    public function render()
    {
        $distribuidores = Distribuidor::all();
        return view('livewire.compra-distribucion.distribuidor.lw-create', compact('distribuidores'));
    }
   
}
