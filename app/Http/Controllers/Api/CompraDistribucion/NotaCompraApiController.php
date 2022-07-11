<?php

namespace App\Http\Controllers\Api\CompraDistribucion;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotaCompraResource;
use App\Models\CompraDistribucion\NotaCompra;
use App\Models\DetalleCompra;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class NotaCompraApiController extends Controller
{

    public function index()
    {
        $Producto = NotaCompra::included()
            ->filter()
            ->sort()
            ->getOrPaginate();
        return NotaCompraResource::collection($Producto);
    }

    public function store(Request $request)
    {
        request()->validate(NotaCompra::$rules);
        $Producto = NotaCompra::create($request->all());
        return NotaCompraResource::make($Producto);
    }


    public function show($id)
    {
        $Producto = NotaCompra::included()->findOrFail($id);
        return NotaCompraResource::make($Producto);
    }

    public function update(Request $request,  $id)
    {
        $Producto = NotaCompra::findOrFail($id);
        request()->validate(NotaCompra::$rules);
        $Producto->update($request->all());
        $Producto->save();
        return NotaCompraResource::make($Producto);
    }

    public function destroy($id)
    {
        $Producto = NotaCompra::findOrFail($id);
        $Producto->delete();
        return NotaCompraResource::make($Producto);
    }

    public function detalles($nota_id)
    {
        return collect(DetalleCompra::join('materia_primas as m', 'detalle_compras.materia_primas_id', '=', 'm.id')
                ->where('detalle_compras.nota_compras_id', $nota_id)
                ->select(
                    'm.*', 
                    'detalle_compras.cantidad as cantidad',
                    'detalle_compras.costo as costo'
                )->get());
    }
}
