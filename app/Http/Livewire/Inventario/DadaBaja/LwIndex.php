<?php

namespace App\Http\Livewire\Inventario\DadaBaja;

use App\Models\Bitacora;
use App\Models\Inventario\DadaBaja;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
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


    public function delete($id)
    {
        $baja = DadaBaja::find($id);
        Bitacora::Bitacora('D', 'DadaBaja', $baja->id);
        $baja->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'cliente':
                $bajas = DadaBaja::where('nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'distribuidor':
                $bajas = DadaBaja::where('estado', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'fecha':
                $bajas = DadaBaja::join('categoria_productos', 'productos.categoria_producto', 'categoria_productos.id')
                    ->where('categoria_productos.nombre', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $bajas = DadaBaja::where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.inventario.dada-baja.lw-index', compact('bajas'));
    }
        // return view('livewire.compra-distribucion.pedidos.lw-index', compact('pedidos'));

}
