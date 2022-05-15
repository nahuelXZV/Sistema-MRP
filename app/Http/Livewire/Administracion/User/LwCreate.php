<?php

namespace App\Http\Livewire\Administracion\User;

use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{
    public $name;
    public $email;
    public $password;

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
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
        return view('livewire.administracion.user.lw-create');
    }
}
