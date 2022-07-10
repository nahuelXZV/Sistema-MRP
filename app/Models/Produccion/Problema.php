<?php

namespace App\Models\Produccion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    use HasFactory;
    protected $fillable = ['manufactura_id', 'mps_id', 'proceso_id', 'tipo_problema', 'descripcion', 'fecha', 'estado'];

    public function manufactura()
    {
        return $this->belongsTo(Manufactura::class);
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }

    public function mps()
    {
        return $this->belongsTo(Mps::class);
    }
}
