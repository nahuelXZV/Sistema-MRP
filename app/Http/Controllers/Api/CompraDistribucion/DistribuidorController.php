<?php

namespace App\Http\Controllers\Api\CompraDistribucion;

use App\Http\Controllers\Controller;
use App\Models\CompraDistribucion\Distribuidor;
use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
    public function index()
    {
        return Distribuidor::all();
    }

    public function delete($id)
    {
        return Distribuidor::find($id)->delete();
    }

    public function show_distribuidora($id)
    {
        return Distribuidor::where('id', '=', $id)->get();
    }

    public function create(Request $request)
    {
        $distribuidor = new Distribuidor();

        $distribuidor->nombre = $request->post('nombre');
        $distribuidor->direccion = $request->post('direccion');
        $distribuidor->telefono = $request->post('telefono');
        $distribuidor->email = $request->post('email');
        $distribuidor->tipo = $request->post('tipo');
        $distribuidor->medio_transporte = $request->post('medio_transporte');

        if ($distribuidor->save()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function update(Request $request, Distribuidor $distribuidor)
    {
        $distribuidor->nombre = $request->post('nombre');
        $distribuidor->direccion = $request->post('direccion');
        $distribuidor->telefono = $request->post('telefono');
        $distribuidor->email = $request->post('email');
        $distribuidor->tipo = $request->post('tipo');
        $distribuidor->medio_transporte = $request->post('medio_transporte');

        if ($distribuidor->update()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
