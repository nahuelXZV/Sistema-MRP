<?php

namespace App\Http\Livewire\Inventario\Maquinaria;


use Livewire\Component;
use App\Models\Bitacora;
use App\Models\Maquinaria;
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
        $maquinarias = Maquinaria::find($id);
        Bitacora::Bitacora('D', 'Producto', $maquinarias->id);
        $maquinarias->delete();
    }
    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $maquinarias = Maquinaria::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'estado':
                $maquinarias = Maquinaria::where('estado', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
          
            default:
                $maquinarias = Maquinaria::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.inventario.maquinaria.lw-index', compact('$maquinarias'));
    }
    
}
