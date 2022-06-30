<?php

namespace App\Http\Livewire\Configuracion\Empresa;

use App\Models\Bitacora;
use App\Models\Empresa;
use Livewire\Component;

class LwIndex extends Component
{

    public function render()
    {

        $empresa = Empresa::find(1);
        return view('livewire.configuracion.empresa.lw-index', compact('empresa'));
    }
}
