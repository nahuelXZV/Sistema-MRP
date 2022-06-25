<?php

namespace App\Http\Controllers\PedidosCompras;

use App\Http\Controllers\Controller;
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
        return view('compra-distribucion.pedidos.show', compact('id'));
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
