<?php

namespace App\Http\Controllers\Api\CompraDistribucion;

use App\Http\Controllers\Controller;
use App\Models\CompraDistribucion\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return Proveedor::all();
    }
    public function delete($id)
    {
        return Proveedor::find($id)->delete();
    }

    public function create(Request $request)
    {
        $proveedor = new Proveedor();

        $proveedor->nombre_empresa = $request->post('nombre_empresa');
        $proveedor->direccion = $request->post('direccion');
        $proveedor->telefono = $request->post('telefono');
        $proveedor->email = $request->post('email');
        $proveedor->encargado = $request->post('encargado');

        if ($proveedor->save()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->nombre_empresa = $request->post('nombre_empresa');
        $proveedor->direccion = $request->post('direccion');
        $proveedor->telefono = $request->post('telefono');
        $proveedor->email = $request->post('email');
        $proveedor->encargado = $request->post('encargado');

        if ($proveedor->update()) {
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
