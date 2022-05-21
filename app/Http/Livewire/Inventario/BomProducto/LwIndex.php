<?php

namespace App\Http\Livewire\Inventario\BomProducto;

use App\Models\Bitacora;
use App\Models\Inventario\BonProducto;
use App\Models\Inventario\Producto;
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
        $bom = BonProducto::find($id);
        Bitacora::Bitacora('D', 'BOM producto', $bom->id);
        $bom->delete();
    }

    public function mount($id)
    {
        $this->producto = Producto::find($id);
    }

    public function render()
    {
        switch ($this->type) {
            case 'tipo':
                $boms = BonProducto::join('materia_primas', 'materia_primas.id', '=', 'bon_productos.materia_prima_id')
                    ->select('bon_productos.*')
                    ->where('materia_primas.tipo', 'like', '%' . $this->attribute . '%')
                    ->where('bon_productos.producto_id', $this->producto->id)
                    ->orderBy('bon_productos.' . $this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'codigo':
                $boms = BonProducto::where('producto_id', $this->producto->id)
                    ->where('id', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            case 'nombre':
                $boms = BonProducto::join('materia_primas', 'materia_primas.id', '=', 'bon_productos.materia_prima_id')
                    ->select('bon_productos.*')
                    ->where('materia_primas.nombre', 'like', '%' . $this->attribute . '%')
                    ->where('bon_productos.producto_id', $this->producto->id)
                    ->orderBy('bon_productos.' . $this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $boms = BonProducto::where('producto_id', $this->producto->id)
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        return view('livewire.inventario.bom-producto.lw-index', compact('boms'));
    }
}
