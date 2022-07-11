<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BajaProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'dada_baja_id',
        'producto_id',
        'cantidad',
    ];


    public function producto()
    {
            return $this->BelongsTo(Producto::class);
    }

    
}

// $table->unsignedBigInteger('dada_baja_id')->nullable();
//             $table->unsignedBigInteger('producto_id')->nullable();
//             $table->unsignedInteger('cantidad')->nullable();
//             $table->foreign('dada_baja_id')->references('id')->on('dada_bajas')->onDelete('cascade')->onUpdate('cascade');
//             $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');