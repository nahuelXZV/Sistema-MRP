<?php

namespace App\Http\Livewire\Inventario\Producto;

use App\Models\Bitacora;
use App\Models\CategoriaProducto;
use App\Models\Inventario\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class LwEdit extends Component
{
    public $producto = [];


    public function mount($id)
    {
        $this->producto = Producto::find($id)->toArray();
    }

    public function edit()
    {
        $this->validate([
            'producto.nombre' => 'required',
            'producto.color' => 'required',
            'producto.tamaño' => 'required',
            'producto.estado' => 'required',
            'producto.peso' => 'required',
            'producto.costo_produccion' => 'required',
            'producto.cantidad' => 'required',
        ]);
        $producto = Producto::find($this->producto['id']);
        $producto->nombre = $this->producto['nombre'];
        $producto->color = $this->producto['color'];
        $producto->tamaño = $this->producto['tamaño'];
        $producto->estado = $this->producto['estado'];
        $producto->peso = $this->producto['peso'];
        $producto->costo_produccion = $this->producto['costo_produccion'];
        $producto->cantidad = $this->producto['cantidad'];
        if ($this->producto['descripcion']) {
            $producto->descripcion = $this->producto['descripcion'];
        }
        if ($this->producto['categoria_producto']) {
            $producto->categoria_producto = $this->producto['categoria_producto'];
        }
        if ($this->producto['especificacion']) {
            $producto->especificacion = $this->producto['especificacion'];
        }
        $producto->save();
        Bitacora::Bitacora('U', 'Producto', $producto->id);
        return redirect()->route('productos.index');
    }

    public function limpiar()
    {
        $this->producto = [];
    }

    public function render()
    {
        $categorias = CategoriaProducto::all();
        return view('livewire.inventario.producto.lw-edit', compact('categorias'));
    }
}
