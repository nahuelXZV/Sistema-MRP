<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return ['cliente' => Cliente::all()];
    }

    public function show_cliente($id)
    {
        return Cliente::where('id', '=', $id)->get();
    }
}
