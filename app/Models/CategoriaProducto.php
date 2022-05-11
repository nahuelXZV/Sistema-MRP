<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class CategoriaProducto extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $table = "categoria_productos";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
