<?php

namespace App\Models\Inventario;

use App\Models\Configuracion\CategoriaMateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use App\Traits\ApiTrait;

class MateriaPrima extends Model implements Auditable
{
    use HasFactory, ApiTrait;
    use AuditingAuditable;

    static $rules = [
        'nombre' => 'required',
        'color' => 'required',
        'tamaño' => 'required',
        'tipo' => 'required',
        'peso' => 'required',
        'tamaño' => 'required',
        'descripcion' => 'required',
        'cantidad' => 'required',
    ];


    protected $fillable = [
        'id',
        'nombre',
        'tipo',
        'descripcion',
        'tamaño',
        'peso',
        'color',
        'idCategoriaMP',
        'cantidad',
    ];

    //para la api, por el cual se va poder filtrar
    //NOMBRES DE LAS RELACIONES
    protected $allowIncluded = ['idCategoriaMP'];
    //ATRIBUTO POR EL CUAL SE VA A BUSCAR
    protected $allowFilter = ['nombre', 'descripcion', 'color', 'tamaño', 'estado', 'peso', 'descripcion', 'idCategoriaMP', 'cantidad'];
    //ATRIBUTO POR LOS CUALES SE PUEDEN ORDENAR
    protected $allowSort = ['nombre', 'descripcion', 'color', 'tamaño', 'estado', 'peso', 'descripcion', 'idCategoriaMP', 'cantidad'];

    //reportes
    static public $atributos = ['nombre', 'descripcion', 'tipo', 'tamaño', 'peso', 'color', 'cantidad'];
    static public $interface = ['Nombre', 'Descripción', 'Tipo', 'Tamaño', 'Peso', 'Color', 'Cantidad'];
    static public $default = ['nombre', 'tipo', 'tamaño', 'peso', 'color', 'cantidad'];
    static public $tabla = 'materia_primas';

    public function idcategoriaMP()
    {
        return $this->belongsTo(CategoriaMateriaPrima::class);
    }
}
