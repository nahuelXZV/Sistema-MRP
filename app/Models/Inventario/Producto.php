<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model implements Auditable
{
    use HasFactory, ApiTrait;
    use AuditingAuditable;

    static $rules = [
        'nombre' => 'required',
        'color' => 'required',
        'tamaño' => 'required',
        'estado' => 'required',
        'peso' => 'required',
        'costo_produccion' => 'required',
        'cantidad' => 'required'
    ];

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

    //reportes
    static public $atributos = ['id', 'nombre', 'descripcion', 'color', 'tamaño', 'estado', 'peso', 'especificacion', 'costo_produccion', 'cantidad'];
    static public $default = ['nombre', 'descripcion', 'estado', 'costo_produccion', 'cantidad'];
    static public $tabla = 'productos';


    //para la api, por el cual se va poder filtrar
    //NOMBRES DE LAS RELACIONES
    protected $allowIncluded = ['categoria_producto'];
    //ATRIBUTO POR EL CUAL SE VA A BUSCAR
    protected $allowFilter = ['nombre', 'descripcion', 'color', 'tamaño', 'estado', 'peso', 'especificacion', 'costo_produccion', 'cantidad', 'categoria_producto'];
    //ATRIBUTO POR LOS CUALES SE PUEDEN ORDENAR
    protected $allowSort = ['nombre', 'descripcion', 'color', 'tamaño', 'estado', 'peso', 'especificacion', 'costo_produccion', 'cantidad', 'categoria_producto'];
    //Fin para filtrar api

    public function categoria_producto()
    {
        return $this->belongsTo(CategoriaProducto::class);
    }

    public function Bom()
    {
        return $this->HasMany(MateriaPrima::class, 'materia_prima_id');
    }
}
