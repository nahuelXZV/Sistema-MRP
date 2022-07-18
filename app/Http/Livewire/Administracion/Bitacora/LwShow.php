<?php

namespace App\Http\Livewire\Administracion\Bitacora;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;

class LwShow extends Component
{
    use WithPagination;
    public $pagination = 10;
    public $attribute = '';
    public $type = 'id';
    public $sort = 'id';
    public $direction = 'desc';


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


    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $bitacoras = Bitacora::join('users', 'users.id', 'bitacoras.id_usuario')
                    ->where('users.name', 'like', '%' . $this->attribute . '%')
                    ->orderBy('bitacoras.' . $this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'fechayhora':
                $bitacoras = Bitacora::where('created_at', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'ip':
                $bitacoras = Bitacora::where('ip', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $bitacoras = Bitacora::orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }

        return view('livewire.administracion.bitacora.lw-show', compact('bitacoras'));
    }
}
