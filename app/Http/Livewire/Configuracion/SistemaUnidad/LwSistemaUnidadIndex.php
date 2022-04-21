<?php

namespace App\Http\Livewire\Configuracion\SistemaUnidad;

use App\Models\Configuracion\CategoriaMateriaPrima;
use App\Models\configuracion\SistemaUnidad;
use Livewire\Component;
use Livewire\WithPagination;

class LwSistemaUnidadIndex extends Component
{
    use WithPagination;
    public $nombre;
    public $abreviatura;
    
    public $pagination = 10;
    public $attribute = '';
    public $type = 'nombre';
    public $sort = 'nombre';
    public $direction = 'asc';

    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function render()
    {
        $unidades = SistemaUnidad::all();
        // $categorias = CategoriaMateriaPrima::all();
        // return view('livewire.configuracion.categoria-prima.lw-categoria-prima-index', compact('categorias'));
        
        // switch ($this->type) {
        //     case 'descripcion':
        //         $categorias = SistemaUnidad::where('descripcion', 'like', '%' . $this->attribute . '%')
        //         ->orderBy($this->sort, $this->direction)
        //         ->paginate($this->pagination);
        //         break;
        //         default:
        //         $categorias = SistemaUnidad::where('nombre', 'like', '%' . $this->attribute . '%')
        //         ->orderBy($this->sort, $this->direction)
        //             ->paginate($this->pagination);
        //         }
                $unidades = SistemaUnidad::where('nombre', 'like', '%' . $this->attribute . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->pagination);       

        return view('livewire.configuracion.sistema-unidad.lw-sistema-unidad-index', compact('unidades'));
        // return $categorias;
        // return view('livewire.configuracion.categoria-prima.lw-categoria-prima-index', compact('categorias'));

    }

    public function delete($id){
        $unidad = SistemaUnidad::find($id);
        $unidad->delete();
    }
}
