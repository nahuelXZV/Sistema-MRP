<?php

namespace App\Http\Livewire\Produccion\Procesos;

use App\Models\Bitacora;
use App\Models\Produccion\Maquinaria;
use App\Models\Produccion\Proceso;
use Livewire\Component;

class LwProcesosCreate extends Component
{

    public $nombre;
    public $descripcion;
    public $maquinaria;
    public function add()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $proceso = Proceso::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'maquinaria_id' => $this->maquinaria,
        ]);
        Bitacora::Bitacora('C', 'Proceso de producción', $proceso->id);
        return redirect()->route('procesos.index');
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
        return view('livewire.produccion.procesos.lw-procesos-create', compact('maquinarias'));
    }
}
