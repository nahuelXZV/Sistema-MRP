<?php

namespace App\Models\CompraDistribucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCancelado extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'pedido_id', 'motivo', 'descripcion', 'fecha', 'hora'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

}
