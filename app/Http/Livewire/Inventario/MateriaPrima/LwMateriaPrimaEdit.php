<?php

namespace App\Http\Livewire\Inventario\MateriaPrima;

use App\Models\Bitacora;
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
        'materia.cantidad'=>'required',
    ]);
    $materia = MateriaPrima::find($this->materia['id']);
    $materia->nombre = $this->materia['nombre'];
    $materia->tipo = $this->materia['tipo'];
    $materia->tamaño = $this->materia['tamaño'];
    $materia->peso = $this->materia['peso'];
    $materia->color = $this->materia['color'];
    $materia->cantidad = $this->materia['cantidad'];
    if ($this->materia['descripcion']) {
        $materia->descripcion = $this->materia['descripcion'];
    }
    if ($this->materia['idCategoriaMP']) {
        $materia->idCategoriaMP = $this->materia['idCategoriaMP'];
    }

    $materia->save();
    Bitacora::Bitacora('U', 'Materia Prima', $materia->id);
    return redirect()->route('materia-prima.index');
    }

    public function render()
    {
        $categorias = CategoriaMateriaPrima::all();
        return view('livewire.inventario.materia-prima.lw-materia-prima-edit',compact('categorias'));
    }
}
