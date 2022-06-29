<?php

namespace App\Http\Controllers\Api\Pedido;

use App\Http\Controllers\Controller;
use App\Models\CompraDistribucion\Pedido;
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

}
