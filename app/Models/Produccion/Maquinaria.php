<?php

namespace App\Models\Produccion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'marca',
        'descripcion',
    ];
    //reportes
    static public $atributos = ['id', 'nombre', 'marca', 'descripcion', 'created_at'];
    static public $default = ['nombre', 'marca', 'descripcion', 'created_at'];
    static public $tabla = 'maquinarias';
}
