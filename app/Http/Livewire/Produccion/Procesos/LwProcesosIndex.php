<?php

namespace App\Http\Livewire\Produccion\Procesos;

use App\Models\Bitacora;
use App\Models\Produccion\Proceso;
use Livewire\Component;
use Livewire\WithPagination;

class LwProcesosIndex extends Component
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
        $proceso = Proceso::find($id);
        Bitacora::Bitacora('D', 'Proceso de producción', $proceso->id);
        $proceso->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $procesos = Proceso::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'descripcion':
                $procesos = Proceso::where('descripcion', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $procesos = Proceso::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.produccion.procesos.lw-procesos-index', compact('procesos'));
    }
}
