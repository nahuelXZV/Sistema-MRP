<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cantidad',
        'producto_id',
        'estado',
        'materia_prima_id'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function materia_prima()
    {
        return $this->belongsTo(MateriaPrima::class);
    }
}
