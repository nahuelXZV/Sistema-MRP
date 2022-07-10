<?php

namespace App\Models\CompraDistribucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    public $fillable = ['nombre_empresa', 'telefono', 'direccion', 'email', 'encargado'];
    //reportes
    static public $tabla = 'proveedors';
    static public $atributos = ['nombre_empresa', 'telefono', 'direccion', 'email', 'encargado'];
    static public $interface = ['Nombre', 'Telefono', 'Dirección', 'Correo', 'Encargado'];
    static public $default = ['nombre_empresa', 'telefono', 'direccion', 'email', 'encargado'];
}
