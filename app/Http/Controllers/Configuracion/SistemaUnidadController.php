<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\configuracion\SistemaUnidad;
use Illuminate\Http\Request;

class SistemaUnidadController extends Controller
{
  
    public function index()
    {        
        return view('configuracion.sistemaunidad.sistemaUnidad');
    }

    public function create()
    {
        return view('configuracion.sistemaunidad.create');
    }
    
    public function edit($id)
    {
        return view('configuracion.sistemaunidad.edit',compact('id'));
    }
}
