<?php

namespace App\Models\Inventario;

use App\Models\Configuracion\CategoriaMateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    use HasFactory;
    protected $fillable = ['nombre',
                            'tipo',
                            'descripcion',
                            'tamaño',
                            'peso',
                            'color',
                            'idCategoriaMP'];

    public function idcategoriaMP(){
        return $this->belongsTo(CategoriaMateriaPrima::class);
    }
}
