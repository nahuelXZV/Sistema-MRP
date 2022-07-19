<?php

namespace App\Http\Livewire\CompraDistribucion\Distribuidor;

use Livewire\Component;
use App\Models\Bitacora;
use App\Models\CompraDistribucion\Distribuidor;
use Livewire\WithPagination;

class LwIndex extends Component
{

    use WithPagination;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'id';
    public $sort = 'id';
    public $direction = 'asc';


    //Metodo de reinicio de buscador
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


    public function delete($id)
    {
        $distribuidores = Distribuidor::find($id);
        $distribuidores->delete();
        Bitacora::Bitacora('D', 'Distribuidores', $distribuidores->id);
    }
    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $distribuidores = Distribuidor::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'id':
                $distribuidores = Distribuidor::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;

            default:
                $distribuidores = Distribuidor::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.compra-distribucion.distribuidor.lw-index', compact('distribuidores'));
    }
}
