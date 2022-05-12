<?php

namespace App\Http\Livewire\Administracion\Bitacora;

use Livewire\Component;
use Livewire\WithPagination;
use OwenIt\Auditing\Models\Audit;

class LwShow extends Component
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


    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $bitacoras = Audit::join('users', 'users.id', 'audits.user_id')
                    ->where('users.name', 'like', '%' . $this->attribute . '%')
                    ->orderBy('audits.' . $this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'fechayhora':
                $bitacoras = Audit::where('created_at', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'ip':
                $bitacoras = Audit::where('ip_address', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $bitacoras = Audit::all();
                break;
        }

        return view('livewire.administracion.bitacora.lw-show', compact('bitacoras'));
    }
}
