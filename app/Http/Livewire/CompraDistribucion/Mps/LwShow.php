<?php

namespace App\Http\Livewire\CompraDistribucion\Mps;

use App\Models\CompraDistribucion\Pedido;
use App\Models\DetallePedido;
use App\Models\Inventario\BonProducto;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use App\Models\Produccion\Estado;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Manufactura;
use App\Models\Produccion\Mps;
use Illuminate\Support\Facades\Redirect;
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
            $this->datos['estadoM'] = $this->mps->estado;
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
                $this->mensaje = 'No se puede verificar la MPS, hay productos sin finalizar';
                $this->error = true;
                return;
            }
        }
        $this->mps->estado = 'Finalizado';
        $this->mps->save();
        $this->pedido->estado = 'Listo para el envio';
        $this->pedido->save();
        return Redirect::route('pedidos.details', $this->pedido->id);
    }


    public function verifMaterial($id)
    {
        $devolver = [];
        $bol = false;

        $estadoP = EstadoPedido::find($id);
        $detallePedido = DetallePedido::find($estadoP->detallePedido_id);
        $producto = Producto::find($detallePedido->producto_id);
        $cantidadN = $estadoP->cantidad_total - $estadoP->cantidad_stock;
        $bom = BonProducto::where('producto_id', $producto->id)->get();

        foreach ($bom as $materia) {        //Recorremos la receta
            $materiaPrima = MateriaPrima::find($materia->materia_prima_id);
            $materialS = $materiaPrima->cantidad;    //cantidad de materia prima disponible
            $materialP = ($materia->cantidad) * $cantidadN; //Multuplicado la cantidad de productos que se necesita
            if ($materialS >= $materialP) {      //Material suficiente para manufactura
                $materiaPrima->cantidad -= $materialP;  //Descontamos stock de la materia prima
                $materiaPrima->update();
                $devolverstock = [                          //Respaldo por si no hay toda la materia prima necesaria
                    'materia_prima_id' => $materiaPrima->id,
                    'cantidad' => $materialP,
                ];
                array_push($devolver, $devolverstock);
            } else {
                $bol = true;
                break;
            }
        }
        if ($bol) {
            foreach ($devolver as $materia) {
                $materiaPrima = MateriaPrima::find($materia['materia_prima_id']);
                $materiaPrima->cantidad += $materia['cantidad'];
                $materiaPrima->update();
            }
            $this->mensaje = 'No hay materiales suficientes';
            $this->error = true;
        } else {
            $estadoP->estado = 'Listo para fabricar';
            $estadoP->save();
            //--Crear manufactura
            Manufactura::create([
                'mps_id' => $this->mps->id,
                'producto_id' => DetallePedido::find($estadoP['detallePedido_id'])->producto_id,
                'cantidad' => $estadoP['cantidad_total'],
                'productos_terminados' => 0,
                'productos_faltante' => $estadoP['cantidad_total'] - $estadoP['cantidad_stock'],
                'estado' => "Sin iniciar",
            ]);
            //-------------------
        }
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
        if ($this->bandera) {
            $this->datos['estadoM'] = $this->mps->estado;
        }
        return view('livewire.compra-distribucion.mps.lw-show', compact('estados'));
    }
}
