<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DadaBajaController extends Controller
{

    public function index()
    {
        return view('inventario.dada-baja.index');
    }

    public function create()
    {
        return view('inventario.dada-baja.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('inventario.dada-baja.show', compact('id'));
        
    }

    public function edit($id)
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
