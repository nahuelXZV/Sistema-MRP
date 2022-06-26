<?php

namespace App\Models\CompraDistribucion;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'distribuidor_id', 'pedido_cancelado_id', 'direccion', 'descripcion', 'estado', 'fecha', 'hora'];

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
}
