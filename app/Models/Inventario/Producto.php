<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'color',
        'tamaño',
        'estado',
        'peso',
        'especificacion',
        'costo_produccion',
        'cantidad',
        'categoria_producto',
    ];

    public function categoria_producto()
    {
        return $this->belongsTo(CategoriaProducto::class);
    }
}
