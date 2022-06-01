<?php

namespace App\Http\Livewire\Configuracion\Empresa;

use App\Models\Bitacora;
use App\Models\Empresa;
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


    //Metodo de reinicio de buscador
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


    public function delete($id)
    {
        $empresa = Empresa::find($id);
        Bitacora::Bitacora('D', 'Empresa', $empresa->id);
        $empresa->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $empresas = Empresa::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'direccion':
                $empresas = Empresa::where('direccion', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'email':
                $empresas = Empresa::where('email',  'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $empresas = Empresa::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.configuracion.empresa.lw-index', compact('empresas'));
    }

}
