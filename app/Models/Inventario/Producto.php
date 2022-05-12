<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Producto extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
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
