<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpsController extends Controller
{

    public function index()
    {
        return view('produccion.mps.index');
    }

    public function details($id)
    {
        return view('produccion.mps.details', compact('id'));
    }
}
