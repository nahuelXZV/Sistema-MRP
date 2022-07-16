<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadaBaja extends Model
{
    use HasFactory;
    protected $fillable = [
        'motivo',
        'descripcion',
        'fecha',
        'hora',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);        
    }


}
