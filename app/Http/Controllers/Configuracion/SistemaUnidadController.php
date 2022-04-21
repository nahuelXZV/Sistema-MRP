<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\configuracion\SistemaUnidad;
use Illuminate\Http\Request;

class SistemaUnidadController extends Controller
{
  
    public function index()
    {
        // $unidades = SistemaUnidad::all();
        // return view('configuracion.sistemaunidad.index', compact('unidades'));
        return view('configuracion.sistemaunidad.index');
    }

    public function create()
    {
        //
    }
    
    public function edit($id)
    {
        return view('configuracion.sistemaunidad.edit',compact('id'));
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
