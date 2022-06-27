<?php

namespace App\Models\Produccion;

use App\Models\Inventario\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufactura extends Model
{
    use HasFactory;
    protected $fillable = ['mps_id', 'producto_id', 'cantidad','productos_terminados','descripcion','estado'];

    public function mps()
    {
        return $this->belongsTo(Mps::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

