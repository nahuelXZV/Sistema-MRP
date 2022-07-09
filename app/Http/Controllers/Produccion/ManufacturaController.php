<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use App\Models\Produccion\EstadoPedido;
use Illuminate\Http\Request;

class ManufacturaController extends Controller
{
    public function show($id, $idP)
    {
        $detalleP = EstadoPedido::find($id);
        return view('produccion.manufactura.manufactura', compact('id', 'idP', 'detalleP'));
    }
}
