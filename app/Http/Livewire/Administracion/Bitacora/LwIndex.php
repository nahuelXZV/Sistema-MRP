<?php

namespace App\Http\Livewire\Administracion\Bitacora;

use App\Models\Empresa;
use Livewire\Component;

class LwIndex extends Component
{
    public $password = '';
    public $autenticado = false;
    public $error = false;

    public function autenticar()
    {
        $this->validate([
            'password' => 'required|min:6',
        ]);
        $contra = Empresa::first()->passwd_bitacora;
        if ($contra == $this->password) {
            $this->autenticado = true;
        } else {
            $this->error = true;
        }
    }

    public function render()
    {
        return view('livewire.administracion.bitacora.lw-index');
    }
}
