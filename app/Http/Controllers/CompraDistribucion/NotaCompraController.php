<?php

namespace App\Http\Controllers\CompraDistribucion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotaCompraController extends Controller
{
    public function index(){
        return view('compra-distribucion.notacompra.index');
    }

    public function edit($id){
        return view('compra-distribucion.notacompra.edit',compact('id'));
    }
    public function create(){
        return view('compra-distribucion.notacompra.create');
    }
}
