<?php

namespace App\Http\Livewire\CompraDistribucion\Proveedor;

use App\Models\Bitacora;
use App\Models\CompraDistribucion\Proveedor;
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
        $proveedores = Proveedor::find($id);
        $proveedores->delete();
    }
    public function render()
    {
        switch ($this->type) {
            case 'nombre_empresa':
                $proveedores = Proveedor::where('nombre_empresa', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'id':
                $proveedores = Proveedor::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $proveedores = Proveedor::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.compra-distribucion.proveedor.lw-index', compact('proveedores'));
    }
}
