<?php

namespace App\Http\Livewire\Configuracion\CategoriaPrima;

use App\Models\Bitacora;
use App\Models\Configuracion\CategoriaMateriaPrima;
use Livewire\Component;

class LwCategoriaPrimaEdit extends Component
{
    public $categoria;
    public $nombre;
    public $descripcion;

    public function render()
    {
        return view('livewire.configuracion.categoria-prima.lw-categoria-prima-edit');
    }

    public function mount($id)
    {
        $this->categoria = CategoriaMateriaPrima::find($id);
        $this->nombre = $this->categoria->nombre;
        $this->descripcion = $this->categoria->descripcion;
    }

    public function guardar()
    {
        $this->validate(['nombre' => 'required', 'descripcion' => 'required']);
        $this->categoria->nombre = $this->nombre;
        $this->categoria->descripcion = $this->descripcion;
        $this->categoria->save();
        Bitacora::Bitacora('U', 'Categoria Materia Prima',  $this->categoria->id);
        return redirect()->route('categoria-prima.index');
    }
}
