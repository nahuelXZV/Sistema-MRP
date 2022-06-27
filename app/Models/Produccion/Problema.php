<?php

namespace App\Models\Produccion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    use HasFactory;
    protected $fillable = ['manufactura_id', 'tipo_problema', 'descripcion', 'fecha'];

    public function manufactura()
    {
        return $this->belongsTo(Manufactura::class);
    }
}
