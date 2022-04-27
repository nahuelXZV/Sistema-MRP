<?php

namespace App\Http\Livewire\Inventario\MateriaPrima;

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

    public function guardar()
    {
        $this->validate(['materia.nombre' => 'required', 
                        'materia.tipo' => 'required',
                        'materia.tamaño'=>'required',
                        'materia.peso'=>'required',
                        'materia.color'=>'required',
                    ]);
        MateriaPrima::create($this->materia);
        return redirect()->route('materia-prima.index');
    }
}
