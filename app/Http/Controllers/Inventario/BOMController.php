<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\BonProducto;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class BOMController extends Controller
{
    public function create($id)
    {
        $producto = Producto::find($id);
        return view('inventario.bom.create', compact('producto'));
    }

    public function edit($id, $idbom)
    {
        $producto = Producto::find($id);
        $bom = BonProducto::find($idbom);
        return view('inventario.bom.edit', compact('producto', 'bom'));
    }
}
