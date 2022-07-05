<?php

namespace App\Http\Livewire\CompraDistribucion\Proveedor;

use App\Models\CompraDistribucion\Proveedor;
use Livewire\Component;

class LwCreate extends Component
{
    public $proveedor = [];

    public function add()
    {
        $this->validate([
            'proveedor.nombre_empresa' => 'required',
            'proveedor.telefono' => 'required',
            'proveedor.direccion' => 'required',
            'proveedor.email' => 'required',
            'proveedor.encargado' => 'required',
        ]);
        Proveedor ::create($this->proveedor);
        return redirect()->route('proveedor.index');
    }

    public function limpiar()
    {
        $this->proveedor = [];
    }

    public function render()
    {
        $proveedores = Proveedor::all();
        return view('livewire.compra-distribucion.proveedor.lw-create', compact('proveedores'));
    }
}
