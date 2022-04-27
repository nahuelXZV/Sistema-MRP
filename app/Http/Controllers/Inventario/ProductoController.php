<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('inventario.producto.producto');
    }

    public function edit($id)
    {
        return view('inventario.producto.edit', compact('id'));
    }
    public function show($id)
    {
        return view('inventario.producto.show', compact('id'));
    }
    public function create()
    {
        return view('inventario.producto.create');
    }
}
