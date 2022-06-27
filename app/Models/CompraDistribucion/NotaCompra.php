<?php

namespace App\Models\CompraDistribucion;

use App\Models\Inventario\MateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    protected $fillable = ['id','fecha','hora','costo_total'];

    public function proveedor_id()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function materia_prima(){
        return $this->belongsToMany(MateriaPrima::class);
    }
}
