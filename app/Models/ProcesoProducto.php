<?php

namespace App\Models;

use App\Models\Inventario\Producto;
use App\Models\Produccion\Proceso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoProducto extends Model
{
    use HasFactory;
    protected $fillable = ['proceso_id', 'producto_id'];

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
