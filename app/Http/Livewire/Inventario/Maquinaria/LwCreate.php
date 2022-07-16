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
        'maquinaria.marca' => 'required',
        'maquinaria.descripcion' => 'required',
     
    ]);
    Maquinaria ::create($this->maquinaria);
    return redirect()->route('maquinarias.index');
}

public function limpiar()
{
    $this->nombre = '';
    $this->descripcion = '';
    $this->maquinaria = '';
}

public function render()
{
    $maquinarias = Maquinaria::all();
    return view('livewire.inventario.maquinaria.lw-create', compact('maquinarias'));
}
   
}
