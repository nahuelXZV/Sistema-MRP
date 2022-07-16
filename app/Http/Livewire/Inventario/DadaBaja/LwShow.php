<?php

namespace App\Http\Livewire\Inventario\DadaBaja;

use App\Models\Inventario\BajaProducto;
use App\Models\Inventario\DadaBaja;
use Livewire\Component;

class LwShow extends Component
{
    public $baja ;
    public $detallesBajaProducto;
    public $datos = [];
    public $botton = 'Verificar';

    
    public function mount($id)
    {
        $this->baja = DadaBaja::find($id)->toArray();
        $this->detallesBajaProducto = BajaProducto::where('dada_baja_id', $this->baja['id'])->get();  
    }

    public function render()
    {
        return view('livewire.inventario.dada-baja.lw-show');
    }
}
