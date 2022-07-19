<?php

namespace App\Models\CompraDistribucion;

use App\Models\Cliente;
use App\Models\Inventario\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'distribuidor_id', 'direccion', 'descripcion', 'estado', 'fecha', 'hora'];

    //reportes
    static public $tabla = 'pedidos';
    static public $atributos = ['direccion', 'fecha', 'hora', 'estado', 'descripcion'];
    static public $interface = ['Dirección', 'Fecha', 'Hora', 'Estado', 'Descripción'];
    static public $default = ['direccion', 'fecha', 'hora', 'estado', 'descripcion'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class);
    }

    public function pedido_cancelado()
    {
        return $this->belongsTo(PedidoCancelado::class);
    }

    // relacion de muchos a muchos
    public function detalle_pedidos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_pedidos', 'producto_id', 'pedido_id')
            ->as('detalle_pedido')
            ->withPivot('id', 'producto_id', 'pedido_id', 'cantidad', 'estado');
    }
}
