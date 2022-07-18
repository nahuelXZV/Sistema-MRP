<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }

    public function show_cliente($id)
    {
        return Cliente::where('id', '=', $id)->get();
    }

    public function delete($id)
    {
        return Cliente::find($id)->delete();
    }

    public function create(Request $request)
    {
        $cliente = new Cliente();

        $cliente->nombre = $request->post('nombre');
        $cliente->direccion = $request->post('direccion');
        $cliente->telefono = $request->post('telefono');

        if ($cliente->save()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function update(Request $request, Cliente $cliente)
    {

        $cliente->nombre = $request->post('nombre');
        $cliente->direccion = $request->post('direccion');
        $cliente->telefono = $request->post('telefono');

        if ($cliente->update()) {
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
