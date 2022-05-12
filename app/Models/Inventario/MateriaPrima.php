<?php

namespace App\Models\Inventario;

use App\Models\Configuracion\CategoriaMateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class MateriaPrima extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'tamaño',
        'peso',
        'color',
        'idCategoriaMP'
    ];

    public function idcategoriaMP()
    {
        return $this->belongsTo(CategoriaMateriaPrima::class);
    }
}
