<?php

namespace App\Http\Livewire\Configuracion\CategoriaPrima;

use App\Http\Controllers\Configuracion\CategoriaPrimaController;
use App\Models\Bitacora;
use App\Models\Configuracion\CategoriaMateriaPrima;
use Livewire\Component;
use Livewire\WithPagination;

class LwCategoriaPrimaIndex extends Component
{
    use WithPagination;
    public $nombre;
    public $descripcion;

    public $pagination = 10;
    public $attribute = '';
    public $type = 'nombre';
    public $sort = 'nombre';
    public $direction = 'asc';

    public function updatingAttribute()
    {
        $this->resetPage();
    }

    //Metodo de ordenado
    public function order($type)
    {
        if ($this->type == $type) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->type = $type;
            $this->direction = 'asc';
        }
    }

    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $categorias = CategoriaMateriaPrima::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $categorias = CategoriaMateriaPrima::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
        }
        return view('livewire.configuracion.categoria-prima.lw-categoria-prima-index', compact('categorias'));
    }

    public function delete($id)
    {
        $nombre = CategoriaMateriaPrima::find($id);
        $nombre->delete();
        Bitacora::Bitacora('D', 'Categoria Materia Prima', $id);
    }
}
