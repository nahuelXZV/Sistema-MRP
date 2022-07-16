<?php

namespace App\Http\Controllers;

use App\Models\CompraDistribucion\Pedido;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::where('estado', '!=', 'Finalizado')->paginate(5);
        return view('welcome', compact('pedidos'));
    }
}
