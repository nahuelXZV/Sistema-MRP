<?php

namespace App\Http\Livewire\CompraDistribucion\Mps;

use App\Models\CompraDistribucion\Pedido;
use App\Models\Produccion\Estado;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Mps;
use Livewire\Component;

class LwShow extends Component
{

    public $pedido;
    public $mps;
    public $bandera = false;
    public $datos = [];
    public $mensaje = 'No se puede verificar la MPS, hay productos sin finalizar';
    public $error = false;
    public $botton = 'Verificar';

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        if (Mps::where('pedido_id', $id)->first()) {
            $this->mps = Mps::where('pedido_id', $this->pedido->id)->first();
            $this->datos['tipo'] = $this->mps->tipo;
            $this->datos['fecha'] = $this->mps->fecha_solicitud;
            $this->datos['cliente'] = $this->mps->pedido->cliente->nombre;
            $this->datos['estado'] = $this->mps->pedido->estado;
            if ($this->mps->pedido->distribuidor) {
                $this->datos['distribuidor'] = $this->mps->pedido->distribuidor->nombre;
            } else {
                $this->datos['distribuidor'] = 'No Asignado';
            }
            $this->datos['direccion'] = $this->mps->pedido->direccion;
            $this->bandera = true;
        }
    }

    public function verificar()
    {
        $estados = EstadoPedido::where('mps_id', $this->mps->id)->get();
        foreach ($estados as $estado) {
            if ($estado->estado != 'Finalizado') {
                $this->error = true;
                return;
            }
        }
        $this->pedido->estado = 'Listo para el envio';
        $this->pedido->save();
    }


    public function render()
    {
        if ($this->bandera) {
            $estados = EstadoPedido::where('mps_id', $this->mps->id)->get();
        } else {
            $estados = [];
        }
        switch ($this->pedido->estado) {
            case 'En Manufactura':
                $this->botton = "Verificar";
                break;
            default:
                $this->botton = 'Ocultar';
                break;
        }
        return view('livewire.compra-distribucion.mps.lw-show', compact('estados'));
    }
}
