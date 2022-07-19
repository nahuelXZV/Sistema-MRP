<?php

namespace App\Http\Livewire\Produccion\Manufactura;

use App\Models\DetallePedido;
use App\Models\Inventario\Producto;
use App\Models\ProcesoProducto;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Manufactura;
use App\Models\Produccion\Proceso;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class LwManufacturaShow extends Component
{
    public $detalleP;
    public $manufactura;
    public $datos;
    public $botton = true;
    public $mensaje;
    public $error = false;
    public $bandera = true;

    public function mount($id, $idP)
    {
        $this->detalleP = EstadoPedido::find($id);
        $this->manufactura = Manufactura::where('mps_id', $this->detalleP->mps_id)
            ->where('producto_id', $idP)->first();
        $this->datos['nombre'] = $this->manufactura->producto->nombre;
        $this->datos['fabricado'] = $this->manufactura->productos_terminados;
        $this->datos['faltante'] = $this->manufactura->productos_faltante;
        $this->datos['estado'] = $this->manufactura->estado;
        $this->datos['cantidad'] = $this->manufactura->cantidad;
    }

    public function iniciar()
    {
        $this->manufactura->estado = 'En proceso';
        $this->manufactura->save();
    }

    public function siguiente()
    {
        if ($this->manufactura->productos_faltante > 0) {
            $this->manufactura->productos_terminados++;
            $this->manufactura->productos_faltante--;
            $this->detalleP->cantidad_stock++;
            $this->detalleP->save();
            $this->manufactura->save();
        }
    }

    public function verificar()
    {
        if ($this->manufactura->productos_faltante == 0) {
            $this->manufactura->estado = 'Finalizado';
            $this->manufactura->save();
            $this->detalleP->estado = 'Finalizado';
            $this->detalleP->save();
            $this->pedidoD = DetallePedido::find($this->detalleP->detallePedido_id);
            $this->pedidoD->estado = 'Listo';
            $this->pedidoD->save();
            $this->bandera = false;
            return Redirect::route('pedidos.details', $this->detalleP->detallePedido->pedido_id);
        } else {
            $this->mensaje = 'No se puede finalizar la fabricación, quedan productos por fabricar';
            $this->error = true;
        }
    }

    public function render()
    {
        $procesos = ProcesoProducto::where('producto_id', $this->manufactura->producto_id)->get();
        $this->datos['estado'] = $this->manufactura->estado;
        $this->datos['fabricado'] = $this->manufactura->productos_terminados;
        $this->datos['faltante'] = $this->manufactura->productos_faltante;

        if ($this->manufactura->estado == 'Finalizado') {
            $this->bandera = false;
        }
        if ($this->manufactura->productos_faltante == 0) {
            $this->botton = false;
        }
        return view('livewire.produccion.manufactura.lw-manufactura-show', compact('procesos'));
    }
}
