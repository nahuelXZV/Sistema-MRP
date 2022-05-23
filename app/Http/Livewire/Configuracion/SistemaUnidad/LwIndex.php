<?php

namespace App\Http\Livewire\Configuracion\SistemaUnidad;

use App\Models\configuracion\SistemaUnidad;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
{
    use WithPagination;
    public $nombre;
    public $abreviatura;

    public $pagination = 10;
    public $attribute = '';
    public $type = 'id';
    public $sort = 'id';
    public $direction = 'asc';

    public function updatingAttribute()
    {
        $this->resetPage();
    }

    //Metodo de ordenado
    public function order($type)
    {
        if ($this->type == $type) {
            $this->direction = ($this->direction == 'desc')? ('asc') : ('desc');
        } else {
            $this->type = $type;
            $this->direction = 'asc';
        }
    }
    public function render()
    {
        switch ($this->type) {
            case 'abreviatura':
                $unidades = SistemaUnidad::where('abreviatura', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $unidades = SistemaUnidad::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
        }
        return view('livewire.configuracion.sistema-unidad.lw-index', compact('unidades'));
    }
}
