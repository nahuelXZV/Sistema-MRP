<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Configuracion\CategoriaMateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    public function index(){
        return view('inventario.materiaprima.materiaprima');
    }

    public function edit($id){
        return view('inventario.materiaprima.edit',compact('id'));
    }
    public function create(){
        return view('inventario.materiaprima.create');
    }
}
