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
        //return DetallePedido::all();
    }

    public function show_producto($id)
    {
        return Producto::where('id', '=', $id)->get();
    }

}
