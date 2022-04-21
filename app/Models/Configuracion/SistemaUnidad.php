<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemaUnidad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','abreviatura'];
    protected $table = "sistema_unidades"; //especificar tabla
}
