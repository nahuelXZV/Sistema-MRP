<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function create(Request $request)
    {
        $user = new User;

        $user->email = $request->post('email');
        $user->password = bcrypt($request->post('password'));

        if ($user->save()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function update(Request $request, User $user)
    {
        $user->email = $request->post('email');

        if ($user->update()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function indexx(){
        return view('administracion.user.user');
    }

    public function editt($id){
        return view('administracion.user.edit',compact('id'));
    }
    public function createe(){
        return view('administracion.user.create');
    }
}
