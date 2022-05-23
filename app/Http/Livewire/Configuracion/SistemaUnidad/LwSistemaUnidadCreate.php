<?php

namespace App\Http\Livewire\Configuracion\SistemaUnidad;

use App\Models\Bitacora;
use App\Models\configuracion\SistemaUnidad;
use Livewire\Component;

class LwSistemaUnidadCreate extends Component
{
    public $nombre;
    public $abreviatura;

    public function render()
    {
        return view('livewire.configuracion.sistema-unidad.lw-sistema-unidad-create');
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'abreviatura' => 'required'
        ]);
        $sistema = SistemaUnidad::create([
            'nombre' => $this->nombre,
            'abreviatura' => $this->abreviatura
        ]);
        Bitacora::Bitacora('C', 'Sistema de unidades', $sistema->id);
        // return "se creo";
        return redirect()->route('sistema-unidad.index');
    }
}
