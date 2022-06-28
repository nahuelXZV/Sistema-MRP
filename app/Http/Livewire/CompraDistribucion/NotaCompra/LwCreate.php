<?php

namespace App\Http\Livewire\CompraDistribucion\NotaCompra;

use App\Models\CompraDistribucion\NotaCompra;
use App\Models\CompraDistribucion\Proveedor;
use Livewire\Component;

class LwCreate extends Component
{
    public $nota = [];

    public function add()
    {
        $this->validate([
            'nota.fecha' => 'required',
            'nota.hora' => 'required',
        ]);
        $this->nota['costo_total'] = '0';
        $nota = NotaCompra::create($this->nota);
        return redirect()->route('nota-compra.index');
    }

    public function limpiar()
    {
        $this->nota = [];
    }
    
    public function render()
    {
        $proveedores = Proveedor::all();
        return view('livewire.compra-distribucion.nota-compra.lw-create',compact('proveedores'));
    }
}
