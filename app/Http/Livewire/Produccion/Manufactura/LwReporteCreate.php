<?php

namespace App\Http\Livewire\Produccion\Manufactura;

use App\Models\Bitacora;
use App\Models\Produccion\Manufactura;
use App\Models\Produccion\Problema;
use App\Models\Produccion\Proceso;
use Livewire\Component;

class LwReporteCreate extends Component
{
    public $proceso;
    public $manufactura;
    public $datos = [];
    public $problema = [];

    public function mount($id, $idM)
    {
        $this->proceso = Proceso::find($id);
        $this->manufactura = Manufactura::find($idM);
        $this->datos['proceso'] = $this->proceso->nombre;
        $this->datos['codigo'] = $this->manufactura->id;
    }

    public function add()
    {
        $this->validate([
            'problema.tipo' => 'required',
            'problema.fecha' => 'required',
            'problema.descripcion' => 'required',
        ]);

        $problema = Problema::create([
            'tipo_problema' => $this->problema['tipo'],
            'fecha' => $this->problema['fecha'],
            'descripcion' => $this->problema['descripcion'],
            'estado' => "Pendiente",
            'proceso_id' => $this->proceso->id,
            'manufactura_id' => $this->manufactura->id,
            'mps_id' => $this->manufactura->mps_id,
        ]);
        return redirect()->route('pedidos.details', $this->manufactura->mps->pedido_id);
    }

    public function limpiar()
    {
        $this->problema = [];
    }
    public function render()
    {
        return view('livewire.produccion.manufactura.lw-reporte-create');
    }
}
