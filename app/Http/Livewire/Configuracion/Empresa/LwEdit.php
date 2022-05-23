<?php

namespace App\Http\Livewire\Configuracion\Empresa;

use App\Models\Bitacora;
use App\Models\Empresa;
use Livewire\Component;

class LwEdit extends Component
{
    public $empresa = [];

    public function mount($id)
    {
        $this->empresa = Empresa::find($id)->toArray();
    }
    public function edit()
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
        $e = Empresa::find($this->empresa['id']);
        $e->update($this->empresa);
        $e->save();
        Bitacora::Bitacora('U', 'empresa', $e->id);
        return redirect()->route('empresas.index');
    }

    public function limpiar()
    {
        $this->empresa = [];
    }
    
    public function render()
    {
        return view('livewire.configuracion.empresa.lw-edit');
    }
}
