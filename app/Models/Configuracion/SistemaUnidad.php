<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class SistemaUnidad extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $fillable = ['nombre', 'abreviatura'];
    protected $table = "sistema_unidades"; //especificar tabla
}
