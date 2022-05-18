<?php

namespace App\Http\Livewire\Administracion\User;

use App\Models\Bitacora;
use App\Models\User;
use Livewire\Component;

use Spatie\Permission\Models\Role;

class LwCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $rol;

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'rol'=>'required'
        ]);
        $rol = Role::find($this->rol);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ])->assignRole($rol->name);
        Bitacora::Bitacora('C', 'Usuario', $user->id);
        return redirect()->route('usuarios.index');
    }

    public function limpiar()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.administracion.user.lw-create',compact('roles'));
    }
}
