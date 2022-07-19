<?php

namespace App\Http\Livewire\CompraDistribucion\Proveedor;

use App\Models\Bitacora;
use App\Models\CompraDistribucion\Proveedor;
use Livewire\Component;

class LwEdit extends Component
{
    public $proveedor = [];

    public function mount($id)
    {
        $proveedor = Proveedor::find($id);
        $this->proveedor['id'] = $proveedor->id;
        $this->proveedor['nombre_empresa'] = $proveedor->nombre_empresa;
        $this->proveedor['telefono'] = $proveedor->telefono;
        $this->proveedor['direccion'] = $proveedor->direccion;
        $this->proveedor['email'] = $proveedor->email;
        $this->proveedor['encargado'] = $proveedor->encargado;
    }

    public function add()
    {
        $this->validate([
            'proveedor.nombre_empresa' => 'required',
            'proveedor.telefono' => 'required',
            'proveedor.direccion' => 'required',
            'proveedor.email' => 'required',
            'proveedor.encargado' => 'required',
        ]);
        $proveedor = Proveedor::find($this->proveedor['id']);
        $proveedor->update($this->proveedor);
        Bitacora::Bitacora('U', 'Proveedores', $proveedor->id);
        return redirect()->route('proveedor.index');
    }

    public function render()
    {
        return view('livewire.compra-distribucion.proveedor.lw-edit');
    }
}
