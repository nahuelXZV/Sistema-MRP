<?php

namespace App\Http\Controllers\Api\Inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MateriaPrimaResource;
use App\Models\Inventario\MateriaPrima;

class MateriaPrimaApiController extends Controller
{
    public function index()
    {
        $Producto = MateriaPrima::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return MateriaPrimaResource::collection($Producto);
    }

    public function store(Request $request)
    {
        request()->validate(MateriaPrima::$rules);
        $Producto = MateriaPrima::create($request->all());
        return MateriaPrimaResource::make($Producto);
    }


    public function show($id)
    {
        $Producto = MateriaPrima::included()->findOrFail($id);
        return MateriaPrimaResource::make($Producto);
    }

    public function update(Request $request,  $id)
    {
        $Producto = MateriaPrima::findOrFail($id);
        request()->validate(MateriaPrima::$rules);
        $Producto->update($request->all());
        $Producto->save();
        return MateriaPrimaResource::make($Producto);
    }

    public function destroy($id)
    {
        $Producto = MateriaPrima::findOrFail($id);
        $Producto->delete();
        return MateriaPrimaResource::make($Producto);
    }
}
