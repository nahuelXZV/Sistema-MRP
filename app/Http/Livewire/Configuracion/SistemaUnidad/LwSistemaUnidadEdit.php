<?php

namespace App\Http\Livewire\Configuracion\SistemaUnidad;

use App\Models\configuracion\SistemaUnidad;
use Livewire\Component;

class LwSistemaUnidadEdit extends Component
{
    public $nombre;
    public $abreviatura;
    public $objUnidad;
    public function render()
    {
        return view('livewire.configuracion.sistema-unidad.lw-sistema-unidad-edit');
    }

    public function mount($id){
        $this->objUnidad = SistemaUnidad::find($id);
        $this->nombre = $this->objUnidad->nombre;
        $this->abreviatura = $this->objUnidad->abreviatura;
    }

    public function store(){
        $this->validate([
            'nombre'=>'required',
            'abreviatura'=>'required'
        ]);
        $this->objUnidad->nombre = $this->nombre;
        $this->objUnidad->abreviatura = $this->abreviatura;
        $this->objUnidad->save();
        return redirect()->route('sistema-unidad.index');
    }
}
