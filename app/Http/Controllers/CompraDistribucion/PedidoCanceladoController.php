<?php

namespace App\Http\Controllers\CompraDistribucion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidoCanceladoController extends Controller
{
    public function index(){
        return view('compra-distribucion.pedidocancelado.index');
    }

    public function edit($id){
        return view('compra-distribucion.pedidocancelado.edit',compact('id'));
    }
    public function create(){
        return view('compra-distribucion.pedidocancelado.create');
    }
}
