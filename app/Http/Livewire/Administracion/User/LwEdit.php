<?php

namespace App\Http\Livewire\Administracion\User;

use App\Models\User;
use Livewire\Component;

class LwEdit extends Component
{
    public $usuario;
    public $name;
    public $email;
    public $password;

    public function mount($id)
    {
        $this->usuario = User::find($id);
        $this->name = $this->usuario->name;
        $this->email = $this->usuario->email;
    }

    public function add()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $this->usuario->name = $this->name;
        $this->usuario->email = $this->email;
        $this->usuario->password = bcrypt($this->password);

        $this->usuario->save();
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
        return view('livewire.administracion.user.lw-edit');
    }
}
