<?php

namespace App\Http\Livewire\Inventario\MateriaPrima;

use App\Models\Bitacora;
use App\Models\Configuracion\CategoriaMateriaPrima;
use App\Models\Inventario\MateriaPrima;
use Livewire\Component;

class LwMateriaPrimaCreate extends Component
{
    public $materia =[];


    public function render()
    {
        $categorias = CategoriaMateriaPrima::all();

        return view('livewire.inventario.materia-prima.lw-materia-prima-create',compact('categorias'));
    }

    public function limpiar()
    {
        $this->materia = [];
    }

    public function guardar()
    {
        $this->validate(['materia.nombre' => 'required', 
                        'materia.tipo' => 'required',
                        'materia.tamaño'=>'required',
                        'materia.peso'=>'required',
                        'materia.color'=>'required',
                        'materia.cantidad'=>'required'
                    ]);
        $materia = MateriaPrima::create($this->materia);
        Bitacora::Bitacora('C', 'Materia Prima', $materia->id);
        return redirect()->route('materia-prima.index');
    }
}
