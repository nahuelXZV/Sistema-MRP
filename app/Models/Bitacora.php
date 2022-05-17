<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $fillable = [
        'evento',
        'tabla',
        'id_registro',
        'ip',
        'id_usuario'
    ];

    static public function Bitacora($evento, $tabla, $id_registro)
    {
        $event = '';
        $bitacora = new Bitacora();
        switch ($evento) {
            case 'C':
                $event = 'Crear';
                break;
            case 'U':
                $event = 'Actualizar';
                break;
            case 'D':
                $event = 'Eliminar';
                break;
            default:
                $event = 'Sin definir';
                break;
        }
        $bitacora->evento = $event;
        $bitacora->tabla = $tabla;
        $bitacora->id_registro = $id_registro;
        $bitacora->ip = request()->ip();
        $bitacora->id_usuario = auth()->user()->id;
        $bitacora->save();
    }


    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
