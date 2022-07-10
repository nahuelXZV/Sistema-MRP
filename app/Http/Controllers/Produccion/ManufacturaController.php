<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use App\Models\CompraDistribucion\Pedido;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Manufactura;
use App\Models\Produccion\Problema;
use Illuminate\Http\Request;

class ManufacturaController extends Controller
{
    public function show($id, $idP)
    {
        $detalleP = EstadoPedido::find($id);
        return view('produccion.manufactura.manufactura', compact('id', 'idP', 'detalleP'));
    }

    public function report($id, $idM)
    {
        return view('produccion.manufactura.reportecreate', compact('id', 'idM'));
    }

    public function details($id)
    {
        $reporte = Problema::find($id);
        $dp = Pedido::find($reporte->mps->pedido_id);
        return view('produccion.manufactura.reporte-detalles', compact('id', 'dp'));
    }
}
