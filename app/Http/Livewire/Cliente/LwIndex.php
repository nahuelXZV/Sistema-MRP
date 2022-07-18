<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Bitacora;
use Livewire\Component;
use App\Models\Cliente;
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
        $cliente = Cliente::find($id);
        $cliente->delete();
        Bitacora::Bitacora('D', 'Clientes',  $cliente->id);
    }
    public function render()
    {
        switch ($this->type) {
            case 'nombre':
                $clientes = Cliente::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
                /* case 'estado':
                $productos = Cliente::where('estado', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'categoria':
                $productos = Cliente::join('categoria_productos', 'productos.categoria_producto', 'categoria_productos.id')
                    ->where('categoria_productos.nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break; */
            default:
                $clientes = Cliente::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.cliente.lw-index', compact('clientes'));
    }
}
