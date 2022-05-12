<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{

    public function index()
    {
        return view('administracion.bitacora.bitacora');
    }

    public function autenticacion()
    {
    }
}
