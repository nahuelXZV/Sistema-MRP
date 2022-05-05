<?php

namespace App\Http\Livewire\Inventario\MateriaPrima;

use App\Models\Configuracion\CategoriaMateriaPrima;
use App\Models\Inventario\MateriaPrima;
use Livewire\Component;

class LwMateriaPrimaEdit extends Component
{

    public $materia = [];

    public function mount($id)
    {
        $this->materia = MateriaPrima::find($id)->toArray();
    }

    public function guardar(){
        $this->validate(['materia.nombre' => 'required', 
        'materia.tipo' => 'required',
        'materia.tamaño'=>'required',
        'materia.peso'=>'required',
        'materia.color'=>'required',
    ]);
    $materia = MateriaPrima::find($this->materia['id']);
    $materia->nombre = $this->materia['nombre'];
    $materia->tipo = $this->materia['tipo'];
    $materia->tamaño = $this->materia['tamaño'];
    $materia->peso = $this->materia['peso'];
    $materia->color = $this->materia['color'];
    if ($this->materia['descripcion']) {
        $materia->descripcion = $this->materia['descripcion'];
    }
    if ($this->materia['idCategoriaMP']) {
        $materia->idCategoriaMP = $this->materia['idCategoriaMP'];
    }

    $materia->save();
    return redirect()->route('materia-prima.index');
    }

    public function render()
    {
        $categorias = CategoriaMateriaPrima::all();
        return view('livewire.inventario.materia-prima.lw-materia-prima-edit',compact('categorias'));
    }
}
