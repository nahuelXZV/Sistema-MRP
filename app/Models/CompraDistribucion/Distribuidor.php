<?php

namespace App\Models\CompraDistribucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Distribuidor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'tipo',
        'medio_transporte',
    ];
    //reportes
    static public $atributos = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'tipo',
        'medio_transporte', 'created_at'
    ];
    static public $interface = [
        'Nombre',
        'Dirección',
        'Teléfono',
        'Email',
        'Tipo',
        'medio_transporte', 'Creado'
    ];
    static public $default = ['nombre', 'direccion', 'telefono', 'email', 'medio_transporte'];
    static public $tabla = 'distribuidors';
}
