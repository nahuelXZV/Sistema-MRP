<?php

namespace App\Http\Livewire\CompraDistribucion\Distribuidor;

use Livewire\Component;
use App\Models\CompraDistribucion\Distribuidor;

class LwShow extends Component
{
    public $distribuidor = [];
    public function mount($id)
    {
        $this->distribuidor = Distribuidor::find($id)->toArray();
    }
    public function render()
    {
        return view('livewire.compra-distribucion.distribuidor.lw-show');
    }
    
    public function guardar(){
        $this->validate(['distribuidor.nombre' => 'required', 
        
    ]);
    $distribuidor = Distribuidor::find($this->distribuidor['id']);
    $distribuidor->nombre = $this->distribuidor['nombre'];
    $distribuidor->telefono = $this->distribuidor['telefono'];
    $distribuidor->direccion = $this->distribuidor['direccion'];
    $distribuidor->save();
    return redirect()->route('distribuidores.index');
    }
    
    
}
