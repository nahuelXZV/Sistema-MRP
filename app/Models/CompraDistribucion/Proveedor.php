<?php

namespace App\Models\CompraDistribucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;


    //reportes
    static public $atributos = ['nombre_empresa', 'telefono', 'direccion', 'email', 'encargado'];
    static public $interface = ['Nombre', 'Teléfono', 'Dirección', 'Correo', 'Encargado'];
    static public $default = ['nombre_empresa', 'telefono', 'direccion', 'email', 'encargado'];
    static public $tabla = 'proveedors';
}
