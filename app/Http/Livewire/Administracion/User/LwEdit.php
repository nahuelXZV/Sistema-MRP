<?php

namespace App\Http\Livewire\Administracion\User;

use App\Models\Bitacora;
use App\Models\User;
use Livewire\Component;

use Spatie\Permission\Models\Role;
class LwEdit extends Component
{
    public $usuario;
    public $name;
    public $email;
    public $rol;

    public function mount($id)
    {
        $this->usuario = User::find($id);
        $this->name = $this->usuario->name;
        $this->email = $this->usuario->email;
        $this->rol = $this->usuario->getRoleNames();
    }

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'rol'=>'required'
        ]);
        $this->usuario->name = $this->name;
        $this->usuario->email = $this->email;
        $this->usuario->syncRoles($this->rol);

        $this->usuario->save();
        Bitacora::Bitacora('U', 'Usuario', $this->usuario->id);
        return redirect()->route('usuarios.index');
    }

    public function limpiar()
    {
        $this->name = '';
        $this->email = '';
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.administracion.user.lw-edit',compact('roles'));
    }
}
