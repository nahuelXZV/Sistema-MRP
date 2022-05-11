<?php

namespace App\Models\Configuracion;

use App\Models\Inventario\MateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class CategoriaMateriaPrima extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $fillable = ['nombre', 'descripcion'];
}
