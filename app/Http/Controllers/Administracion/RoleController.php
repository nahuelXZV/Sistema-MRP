<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        return view('administracion.rol.index');
    }

    public function edit($id){
        return view('administracion.rol.edit',compact('id'));
    }
    public function create(){
        return view('administracion.rol.create');
    }
}
