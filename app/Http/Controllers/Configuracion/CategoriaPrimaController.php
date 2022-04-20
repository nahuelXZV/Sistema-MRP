<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaPrimaController extends Controller
{
    public function index(){
        return view('configuracion.categoriaprima.categoriaprima');
    }

    public function edit($id){
        return view('configuracion.categoriaprima.edit',compact('id'));
    }
    public function create(){
        return view('configuracion.categoriaprima.create');
    }
}
