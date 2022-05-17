<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Cliente extends Model implements Auditable
{
    use HasFactory;
    use AuditingAuditable;
    protected $table = "clientes";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //reportes
    static public $atributos = ['id', 'nombre', 'telefono', 'direccion'];
    static public $default = ['nombre', 'telefono', 'direccion'];
    static public $tabla = 'clientes';
}
