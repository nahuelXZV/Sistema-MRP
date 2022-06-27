<?php

namespace App\Http\Livewire\Configuracion\CategoriaPrima;

use App\Models\Bitacora;
use App\Models\Configuracion\CategoriaMateriaPrima;
use Livewire\Component;

class LwCategoriaPrimaCreate extends Component
{
    public $nombre;
    public $descripcion;

    public function render()
    {
        return view('livewire.configuracion.categoria-prima.lw-categoria-prima-create');
    }

    public function limpiar()
    {
        $this->nombre = '';
        $this->descripcion = '';
    }

    public function guardar()
    {
        $this->validate(['nombre' => 'required', 'descripcion' => 'required']);
        $categoria = CategoriaMateriaPrima::create(['nombre' => $this->nombre, 'descripcion' => $this->descripcion]);
        Bitacora::Bitacora('C', 'Categoria Materia Prima', $categoria->id);
        return redirect()->route('categoria-prima.index');
    }
}
