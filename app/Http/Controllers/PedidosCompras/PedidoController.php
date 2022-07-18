<?php

namespace App\Http\Controllers\PedidosCompras;

use App\Http\Controllers\Controller;
use App\Models\Produccion\Manufactura;
use App\Models\Produccion\Mps;
use App\Models\Produccion\Problema;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return view('compra-distribucion.pedidos.pedidos');
    }

    public function edit($id)
    {
        return view('compra-distribucion.pedidos.edit', compact('id'));
    }

    public function details($id)
    {
        $mps = Mps::where('pedido_id', $id)->first();
        if ($mps) {
            $manu = Manufactura::where('mps_id', $mps->id)->first();
            if ($manu != null) {
                $rep = Problema::where('mps_id', $mps->id)->first();
            } else {
                $rep = null;
            }
        } else {
            $manu = null;
            $rep = null;
        }
        return view('compra-distribucion.pedidos.show', compact('id', 'mps', 'manu', 'rep'));
    }

    public function create()
    {
        return view('compra-distribucion.pedidos.create');
    }

    public function add($id)
    {
        return view('compra-distribucion.pedidos.addproduct', compact('id'));
    }
}
