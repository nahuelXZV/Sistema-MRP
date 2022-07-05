<?php

namespace App\Models;

use App\Models\CompraDistribucion\NotaCompra;
use App\Models\Inventario\MateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $fillable = ['nota_compras_id','materia_primas_id','cantidad','costo'];
    use HasFactory;

    public function nota()
    {
        return $this->belongsTo(NotaCompra::class, 'nota_compras_id', 'id');
    }

    public function materia(){
        return $this->belongsTo(MateriaPrima::class);
    }
}
