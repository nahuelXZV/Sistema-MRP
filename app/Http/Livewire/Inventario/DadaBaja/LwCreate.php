<?php

namespace App\Http\Livewire\Inventario\DadaBaja;

use App\Models\Inventario\BajaProducto;
use App\Models\Inventario\DadaBaja;
use App\Models\Inventario\Producto;
use Livewire\Component;

class LwCreate extends Component
{

    public $baja = [];           //dada de baja unico
    public $producto = [];       //seleccion de un solo producto unico
    public $productos = [];      //lista de todos los productos añadidos


    public function add()
    {
        $this->validate([
            'baja.motivo' => 'required',
            'baja.descripcion' => 'required',
            'baja.fecha' => 'required',
        ]);
        $this->baja['estado'] = 'Pendiente';
        $this->baja['hora'] = now();
        // $pedido = Pedido::create($this->pedido);
        // Bitacora::Bitacora('C', 'Pedido', $pedido->id);
        // return redirect()->route('pedidos.add', $pedido->id);
        return redirect()->route('dada-baja.index');
    }
    //  productos
    public function addProducto()
    {
        $this->validate([
            'producto.producto_id' => 'required',
            'producto.cantidad' => 'required|min:0',
        ]);
        $this->producto['id'] = count($this->productos);
        $this->producto['nombre'] = Producto::where('id', $this->producto['producto_id'])->first()->nombre;
        array_push($this->productos, $this->producto);
        $this->producto = [];
        $this->render();
    }

    public function delete($id)
    {
        unset($this->productos[$id]);
    }
    //Dada Baja
    public function finalizar()
    {   
        $this->validate([
            'baja.motivo' => 'required',
            'baja.descripcion' => 'required',
            'baja.fecha' => 'required',
            
        ]);
        if (count($this->productos) == 0) {
            $mensaje ='!Error, Seleccione Productos';
            $this->render($mensaje);
        } else {
            // $this->baja['estado'] = 'Pendiente';
            $this->baja['hora'] = now();
            $b = DadaBaja::create($this->baja);
            foreach ($this->productos as $p) {
                $p['dada_baja_id'] = $b->id ;
                BajaProducto::create($p);
            }
            return redirect()->route('dada-baja.index');

        }
    }
    public function limpiar()
    {
        $this->baja = [];
        $this->producto = [];
    }

    public function render($m = '')
    {
        $products = Producto::all();
        $detalles = $this->productos;
        $mensaje['error'] = $m;
        return view('livewire.inventario.dada-baja.lw-create', compact('products', 'detalles'), $mensaje);
    }
}
