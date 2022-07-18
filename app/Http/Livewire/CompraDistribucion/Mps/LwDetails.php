<?php

namespace App\Http\Livewire\CompraDistribucion\Mps;

use App\Models\CompraDistribucion\Pedido;
use App\Models\Produccion\Estado;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Mps;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class LwDetails extends Component
{
    public $pedido;
    public $mps;
    public $bandera = false;
    public $datos = [];
    public $mensaje = 'No se puede verificar la MPS, hay productos sin finalizar';
    public $error = false;

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        if (Mps::where('pedido_id', $id)->first()) {
            $this->mps = Mps::where('pedido_id', $this->pedido->id)->first();
            $this->datos['tipo'] = $this->mps->tipo;
            $this->datos['fecha'] = substr($this->mps->fecha_solicitud, 0, 10);
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
        //return Redirect::route('pedidos.details', $this->pedido->id);
    }


    public function render()
    {
        if ($this->bandera) {
            $estados = EstadoPedido::where('mps_id', $this->mps->id)->get();
        } else {
            $estados = [];
        }
        return view('livewire.compra-distribucion.mps.lw-details', compact('estados'));
    }
}
