<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        return view('configuracion.empresa.empresa');
    }

    public function edit($id)
    {
        return view('configuracion.empresa.edit', compact('id'));
    }
    public function show($id)
    {
        return view('configuracion.empresa.show', compact('id'));
    }
    public function create()
    {
        return view('configuracion.empresa.create');
    }
}
