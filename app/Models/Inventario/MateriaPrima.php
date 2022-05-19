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

    //reportes
    static public $atributos = ['id', 'nombre', 'descripcion', 'tipo', 'tamaño', 'peso', 'color'];
    static public $interface = ['Código', 'Nombre', 'Descripción', 'Tipo', 'Tamaño', 'Peso', 'Color'];
    static public $default = ['nombre', 'tipo', 'tamaño', 'peso', 'color'];
    static public $tabla = 'materia_primas';

    public function idcategoriaMP()
    {
        return $this->belongsTo(CategoriaMateriaPrima::class);
    }
}
