<?php

namespace App\Http\Livewire\Inventario\Maquinaria;

use App\Models\Bitacora;
use App\Models\Inventario\Maquinaria;
use Livewire\Component;

class LwCreate extends Component
{
    public $maquinaria = [];
    public $nombre;
    public $descripcion;
  
    public function add()
    {
        $this->validate([
            'maquinaria.nombre' => 'required',
            'maquinaria.descripcion' => 'required',
            'maquinaria.marca' => 'required',

        ]);
        $ma = Maquinaria::create($this->Maquinaria);
        Bitacora::Bitacora('C', 'Maquinaria', $ma->id);
        return redirect()->route('maquinarias.index');
    }

    public function limpiar()
    {
        $this->Maquinaria = [];
    }

    public function render()
    {
        $maquinarias = Maquinaria::all();
        return view('livewire.inventario.maquinaria.lw-create', compact('maquinarias'));
    }
}
