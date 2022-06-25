<?php

namespace App\Http\Livewire\Produccion\Procesos;

use App\Models\Bitacora;
use App\Models\Produccion\Maquinaria;
use App\Models\Produccion\Proceso;
use Livewire\Component;

class LwProcesosEdit extends Component
{
    public $proceso;
    public $nombre;
    public $descripcion;
    public $maquinaria;

    public function mount($id)
    {
        $this->proceso = Proceso::find($id);
        $this->nombre = $this->proceso->nombre;
        $this->descripcion = $this->proceso->descripcion;
        $this->maquinaria = $this->proceso->maquinaria_id;
    }
    public function edit()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $this->proceso->nombre = $this->nombre;
        $this->proceso->descripcion = $this->descripcion;
        if ($this->maquinaria) {
            $this->proceso->maquinaria_id = $this->maquinaria;
        }
        $this->proceso->save();
        Bitacora::Bitacora('U', 'Proceso de producción', $this->proceso->id);
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
        return view('livewire.produccion.procesos.lw-procesos-edit', compact('maquinarias'));
    }
}
