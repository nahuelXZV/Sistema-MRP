<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcesosController extends Controller
{
    //

    public function index()
    {
        return view('produccion.procesos.procesos');
    }

    public function create()
    {
        return view('produccion.procesos.create');
    }

    public function edit($id)
    {
        return view('produccion.procesos.edit', compact('id'));
    }

    public function productos($id)
    {
        return view('inventario.proceso.create', compact('id'));
    }
}
