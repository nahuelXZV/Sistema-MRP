<?php

namespace App\Http\Controllers\Api\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Maquinaria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MaquinariaApiController extends Controller
{

    public function index()
    {        
        $c = Collect(Maquinaria::all());
        return response()->json([
            'data' => $c,
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Maquinaria $maquinaria)
    {
        //
    }

    public function update(Request $request, Maquinaria $maquinaria)
    {
        //
    }

    public function destroy(Maquinaria $maquinaria)
    {
        //
    }
}
