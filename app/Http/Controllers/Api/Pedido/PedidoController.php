<?php

namespace App\Http\Controllers\Api\Pedido;

use App\Http\Controllers\Controller;
use App\Models\CompraDistribucion\Pedido;
use App\Models\DetallePedido;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return Pedido::all();
    }
    public function show(Request $request, Pedido $pedido)
    {
        $pedido->estado = $request->post('estado');

        if ($pedido->update()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function delete($id)
    {
        return Pedido::find($id)->delete();
    }

    public function show_detalle($id)
    {
        return DetallePedido::join('productos', 'detalle_pedidos.producto_id', 'productos.id')->select('detalle_pedidos.id', 'productos.nombre as producto', 'detalle_pedidos.cantidad', 'productos.estado as estado')->where('detalle_pedidos.pedido_id', '=', $id)->get();
    }

    public function show_producto_detalle($id){
        return Producto::join('categoria_productos', 'productos.categoria_producto', 'categoria_productos.id')->select('productos.id', 'productos.nombre', 'productos.descripcion', 'productos.color', 'productos.tamaño', 'productos.estado', 'productos.peso', 'productos.especificacion', 'productos.costo_produccion', 'productos.cantidad', 'categoria_productos.nombre as categoria_producto' )->where('productos.id', '=', $id)->get();
    }

}
