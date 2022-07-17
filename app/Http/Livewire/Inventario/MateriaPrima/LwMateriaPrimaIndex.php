<?php

namespace App\Http\Livewire\Inventario\MateriaPrima;

use App\Models\Bitacora;
use App\Models\Inventario\MateriaPrima;
use Livewire\Component;
use Livewire\WithPagination;

class LwMateriaPrimaIndex extends Component
{
    use WithPagination;

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
                $materias = MateriaPrima::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'tipo':
                $materias = MateriaPrima::where('tipo', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $materias = MateriaPrima::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.inventario.materia-prima.lw-materia-prima-index', compact('materias'));
    }

    public function delete($id)
    {
        $nombre = MateriaPrima::find($id);
        Bitacora::Bitacora('D', 'Materia Prima', $nombre->id);
        $nombre->delete();
    }
}
