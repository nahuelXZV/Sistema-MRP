<?php

namespace App\Http\Livewire\CompraDistribucion\PedidoCancelado;

use App\Models\CompraDistribucion\Pedido;
use App\Models\CompraDistribucion\PedidoCancelado;
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

    public function delete($id)
    {
        $pedido = PedidoCancelado::find($id);
        $pedido->delete();
    }

    public function render()
    {
        switch ($this->type) {
            case 'fecha':
                $pedidosc = PedidoCancelado::where('fecha', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
            default:
                $pedidosc = PedidoCancelado::where('fecha', 'like', '%' . $this->attribute . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->pagination);
                break;
        }
        $pedidos = Pedido::all();
        return view('livewire.compra-distribucion.pedido-cancelado.lw-index',compact('pedidosc','pedidos'));
    }
}
