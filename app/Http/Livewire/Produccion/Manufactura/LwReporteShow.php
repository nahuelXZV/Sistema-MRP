<?php

namespace App\Http\Livewire\Produccion\Manufactura;

use App\Models\Bitacora;
use App\Models\Produccion\Problema;
use Livewire\Component;

class LwReporteShow extends Component
{
    public $problema;
    public $datos = [];

    public function mount($id)
    {
        $this->problema = Problema::find($id);
        $this->datos['proceso'] = $this->problema->proceso->nombre;
        $this->datos['codigo'] = $this->problema->manufactura->id;
        $this->datos['tipo'] = $this->problema->tipo_problema;
        $this->datos['fecha'] = $this->problema->fecha;
        $this->datos['descripcion'] = $this->problema->descripcion;
        $this->datos['estado'] = $this->problema->estado;
    }

    public function verificar()
    {
        $this->problema->estado = "Verificado";
        $this->problema->save();
    }

    public function delete()
    {
        Bitacora::Bitacora('D', 'Problemas de producción', $this->problema->id);
        $this->problema->delete();
        return redirect()->route('pedidos.details', $this->problema->mps->pedido_id);
    }

    public function render()
    {
        $this->datos['estado'] = $this->problema->estado;
        return view('livewire.produccion.manufactura.lw-reporte-show');
    }
}
