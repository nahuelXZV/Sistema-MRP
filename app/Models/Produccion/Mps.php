<?php

namespace App\Models\Produccion;

use App\Models\CompraDistribucion\Pedido;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mps extends Model
{
    use HasFactory;
    protected $fillable = ['pedido_id', 'tipo', 'fecha_solicitud', 'estado'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
