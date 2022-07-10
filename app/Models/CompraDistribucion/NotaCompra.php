<?php

namespace App\Models\CompraDistribucion;

use App\Models\DetalleCompra;
use App\Models\Inventario\MateriaPrima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class NotaCompra extends Model
{
    use HasFactory, ApiTrait;
    protected $fillable = ['proveedor_id', 'costo_total', 'hora', 'fecha'];

    static $rules = [
        'nombre' => 'required',
        'color' => 'required',
        'tamaño' => 'required',
        'tipo' => 'required',
        'peso' => 'required',
        'tamaño' => 'required',
        'descripcion' => 'required',
        'cantidad' => 'required',
    ];

    //para la api, por el cual se va poder filtrar
    //NOMBRES DE LAS RELACIONES
    protected $allowIncluded = ['proveedor_id', 'materia_prima', 'detalle_compras'];
    //ATRIBUTO POR EL CUAL SE VA A BUSCAR
    protected $allowFilter = ['id', 'proveedor_id', 'costo_total', 'hora', 'fecha'];
    //ATRIBUTO POR LOS CUALES SE PUEDEN ORDENAR
    protected $allowSort = ['id', 'proveedor_id', 'costo_total', 'hora', 'fecha'];


    //reportes
    static public $tabla = 'nota_compras';
    static public $atributos = ['costo_total', 'hora', 'fecha'];
    static public $interface = ['Costo total', 'Hora', 'Fecha'];
    static public $default = ['costo_total', 'hora', 'fecha'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function materia_prima()
    {
        return $this->belongsToMany(MateriaPrima::class);
    }

    public function detalle_compras()
    {
        return $this->hasMany(DetalleCompra::class, 'nota_compras_id');
    }

    public function productos()
    {
        return;
    }
}
