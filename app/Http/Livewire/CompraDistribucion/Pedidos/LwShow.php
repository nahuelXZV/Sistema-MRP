<?php

namespace App\Http\Livewire\CompraDistribucion\Pedidos;

use App\Models\CompraDistribucion\Pedido;
use App\Models\DetalleCompra;
use App\Models\DetallePedido;
use App\Models\Inventario\BonProducto;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use App\Models\Produccion\Estado;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Mps;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class LwShow extends Component
{
    public $pedido;
    public $datos = [];
    public $botton = 'Verificar';

    public function mount($id)
    {
        $this->pedido = Pedido::find($id);
        $this->datos['cliente'] = $this->pedido->cliente->nombre;
        if ($this->pedido->distribuidor) {
            $this->datos['distribuidor'] = $this->pedido->distribuidor;
        } else {
            $this->datos['distribuidor'] = 'No Asignado';
        }
        $this->datos['fecha'] = $this->pedido->fecha;
        $this->datos['hora'] = $this->pedido->hora;
        $this->datos['descripcion'] = $this->pedido->descripcion;
        $this->datos['estado'] = $this->pedido->estado;
        $this->datos['direccion'] = $this->pedido->direccion;
    }


    public function continuar()
    {
        $dpedidos = DetallePedido::where('pedido_id', $this->pedido->id)->get();
        $ListMPS = [];
        $devolver = [];

        if ($this->pedido->estado == 'Listo para el envio') {
            $this->pedido->estado = 'Finalizado';
            $this->pedido->save();
            $this->botton = 'Ocultar';
            $this->render();
            return;
        }
        // 5 mesas
        foreach ($dpedidos as $pedido) {
            $cantidadP = $pedido->cantidad;
            $producto = Producto::find($pedido->producto_id);
            $cantidadS = $producto->cantidad;
            if ($cantidadS >= $cantidadP) {         //Stock suficiente en el almacen
                $producto->cantidad -= $cantidadP;      //Descontamos el stock del producto
                $producto->update();
                $pedido->estado = 'Listo';          //Pedido listo para enviar
                $pedido->update();
            } else {
                $pedido->estado = 'Verificado';          //estado detalle de pedido pendiente
                $pedido->update();
                $cantidadN = $cantidadP - $cantidadS;  //cantidad necesaria de fabricacion
                $bom = BonProducto::where('producto_id', $pedido->producto->id)->get(); //La receta del producto
                $estado = [
                    'mps_id' => -1,
                    'detallePedido_id' => $pedido->id,
                    'cantidad_total' => $cantidadP,
                    'cantidad_stock' => $cantidadS,
                    'estado' => 'Listo para fabricar',
                ];
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
                        $estado['estado'] = 'No hay material suficiente';       //Sin materia prima necesaria
                        break;
                    }
                }
                if ($estado['estado'] == 'No hay material suficiente') {    //Verif si no hay la materia prima necesaria para devolver el stock
                    foreach ($devolver as $materia) {
                        $materiaPrima = MateriaPrima::find($materia['materia_prima_id']);
                        $materiaPrima->cantidad += $materia['cantidad'];
                        $materiaPrima->update();
                    }
                }
                array_push($ListMPS, $estado);
            }
        }

        if (count($ListMPS) == 0) {    //Hay stock para todo el pedido
            $this->pedido->estado = 'Listo para el envio';
            $this->botton = "Finalizar";
        } else {
            $mps = Mps::create([    //Creamos el MPS
                'pedido_id' => $this->pedido->id,
                'fecha_solicitud' => date('Y-m-d'),
                'tipo' => 'Pedido'
            ]);
            foreach ($ListMPS as $estado) {     //Creamos los estados del mps
                $estado['mps_id'] = $mps->id;
                EstadoPedido::create($estado);
            }
            $producto->cantidad -= $cantidadS;
            $producto->update();
            $this->pedido->estado = 'En Manufactura';       //Estado del pedido modificado
        }
        $this->pedido->save();                          //Pedido actualizado
        $this->render();
    }

    public function render()
    {
        switch ($this->pedido->estado) {
            case 'Listo para el envio':
                $this->botton = "Finalizar";
                break;
            case 'Finalizado':
                $this->botton = "Ocultar";
                break;
            case 'Cancelado':
                $this->botton = "OcultarV";
                break;
            case 'En Manufactura':
                $this->botton = "OcultarV";
                break;
            default:
                $this->botton = 'Verificar';
                break;
        }
        $dpedidos = DetallePedido::where('pedido_id', $this->pedido->id)->get();
        if ($this->pedido) {
            $this->datos['estado'] = $this->pedido->estado;
        }
        return view('livewire.compra-distribucion.pedidos.lw-show', compact('dpedidos'));
    }
}
