<?php

namespace App\Http\Controllers\Api\Inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MateriaPrimaResource;
use App\Models\Inventario\MateriaPrima;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        return MateriaPrima::all();
    }

    public function mostrar($id){
        return MateriaPrima::join('categoria_materia_primas', 'materia_primas.idCategoriaMP', 'categoria_materia_primas.id')->select('materia_primas.id', 'materia_primas.nombre', 'materia_primas.tipo', 'materia_primas.descripcion', 'materia_primas.tamaño', 'materia_primas.peso', 'materia_primas.color', 'materia_primas.cantidad', 'categoria_materia_primas.nombre as categoria_materia' )->get();
    }

    /*
    public function delete($id)
    {
        return MateriaPrima::find($id)->delete();
    }

    public function create(Request $request)
    {
        $materia = new MateriaPrima();

        $materia->nombre = $request->post('nombre');
        $materia->tipo = $request->post('tipo');
        $materia->descripcion = $request->post('descripcion');
        $materia->tamaño = $request->post('tamaño');
        $materia->peso = $request->post('peso');
        $materia->color = $request->post('color');
        $materia->idCateroiaMP = $request->post('idCategoriaMP');

        if ($materia->save()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function update(Request $request, MateriaPrima $materia)
    {
        $materia->nombre = $request->post('nombre');
        $materia->tipo = $request->post('tipo');
        $materia->descripcion = $request->post('descripcion');
        $materia->tamaño = $request->post('tamaño');
        $materia->peso = $request->post('peso');
        $materia->color = $request->post('color');
        $materia->idCateroiaMP = $request->post('idCategoriaMP');

        if ($materia->update()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }*/

}
