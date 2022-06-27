<?php

namespace App\Models\Produccion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'maquinaria_id'];


    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class);
    }
}
