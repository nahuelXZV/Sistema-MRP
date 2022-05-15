<?php

namespace App\Http\Controllers\Api\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{

    public function index()
    {
        $Producto = Producto::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return ProductoResource::collection($Producto);
    }

    public function store(Request $request)
    {
        request()->validate(Producto::$rules);
        $Producto = Producto::create($request->all());
        return ProductoResource::make($Producto);
    }


    public function show($id)
    {
        $Producto = Producto::included()->findOrFail($id);
        return ProductoResource::make($Producto);
    }

    public function update(Request $request,  $id)
    {
        $Producto = Producto::findOrFail($id);
        request()->validate(Producto::$rules);
        $Producto->update($request->all());
        $Producto->save();
        return ProductoResource::make($Producto);
    }

    public function destroy($id)
    {
        $Producto = Producto::findOrFail($id);
        $Producto->delete();
        return ProductoResource::make($Producto);
    }
}
