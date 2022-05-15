<?php

namespace App\Http\Livewire\Administracion\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
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
            case 'email':
                $usuarios = User::where('email', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $usuarios = User::where('name', 'like', '%' . $this->attribute . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->pagination);
                break;
        }
        return view('livewire.administracion.user.lw-index',compact('usuarios'));
    }

    public function delete($id)
    {
        $nombre = User::find($id);
        $nombre->delete();
    }
}
