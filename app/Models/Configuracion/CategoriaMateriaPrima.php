<?php

namespace App\Models\Configuracion;

use App\Models\Inventario\MateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMateriaPrima extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion'];
    
}
