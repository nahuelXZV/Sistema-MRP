<?php

namespace App\Models\Produccion;

use App\Models\DetallePedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    use HasFactory;
    protected $fillable = ['mps_id', 'detallePedido_id', 'cantidad_total', 'cantidad_stock', 'estado'];

    public function mps()
    {
        return $this->belongsTo(Mps::class);
    }

    public function detallePedido()
    {
        return $this->belongsTo(DetallePedido::class);
    }
}
