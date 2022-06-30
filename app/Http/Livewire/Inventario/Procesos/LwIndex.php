<?php

namespace App\Http\Livewire\Inventario\Procesos;

use App\Models\Bitacora;
use App\Models\Inventario\Producto;
use App\Models\ProcesoProducto;
use App\Models\Produccion\Proceso;
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
    public $producto;

    public function mount($id)
    {
        $this->producto = Producto::find($id);
    }

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
        $prosprod = ProcesoProducto::find($id);
        Bitacora::Bitacora('D', 'Proceso de producto', $prosprod->id);
        $prosprod->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'descripcion':
                $procesos = ProcesoProducto::join('procesos', 'procesos.id', '=', 'proceso_productos.proceso_id')
                    ->select('proceso_productos.*')
                    ->where('procesos.descripcion', 'like', '%' . $this->attribute . '%')
                    ->where('proceso_productos.producto_id', $this->producto->id)
                    ->orderBy('proceso_productos.' . $this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'nombre':
                $procesos = ProcesoProducto::join('procesos', 'procesos.id', '=', 'proceso_productos.proceso_id')
                    ->select('proceso_productos.*')
                    ->where('procesos.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('proceso_productos.producto_id', $this->producto->id)
                    ->orderBy('proceso_productos.' . $this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $procesos = ProcesoProducto::where('producto_id', $this->producto->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.inventario.procesos.lw-index', compact('procesos'));
    }
}
