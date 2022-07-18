<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    use HasFactory;
    static public $tabla = 'maquinarias';
   protected  $fillable = ['nombre', 'marca', 'descripcion'];

}
