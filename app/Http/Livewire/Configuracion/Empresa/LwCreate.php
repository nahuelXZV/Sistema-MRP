<?php

namespace App\Http\Livewire\Configuracion\Empresa;

use App\Models\Bitacora;
use App\Models\Empresa;
use Livewire\Component;

class LwCreate extends Component
{
    public $empresa = [];

    public function add()
    {
        $this->validate([
            'empresa.nombre' => 'required',
            'empresa.licencia' => 'required',
            'empresa.direccion' => 'required',
            'empresa.telefono' => 'required',
            'empresa.email' => 'required',
            'empresa.ciudad' => 'required',
        ]);
        $this->empresa['passwd_bitacora'] = '1234567';
        $empresa = Empresa::create($this->empresa);
        Bitacora::Bitacora('C', 'empresa', $empresa->id);
        // $this->redirect(route('empresas.index'));
        return redirect()->route('empresas.index');
    }

    public function limpiar()
    {
        $this->empresa = [];
    }
    
    public function render()
    {
        return view('livewire.configuracion.empresa.lw-create');
    }

}
