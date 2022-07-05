<?php

namespace App\Models\CompraDistribucion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;


    //reportes
    static public $tabla = 'proveedors';
    public $fillable = ['nombre_empresa', 'telefono', 'direccion', 'email', 'encargado'];

}
