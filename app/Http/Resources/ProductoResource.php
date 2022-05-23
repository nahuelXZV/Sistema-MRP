<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'nombre' => $this->nombre ,
            'descripcion' => $this->descripcion , 
            'color' => $this->color ,
            'tamano' => $this->tamaño,
            'estado' => $this->estado ,
            'peso' => $this->peso ,
            'especificacion' => $this->especificacion,
            'costoProduccion' => $this->costo_produccion,
            'cantidad' => $this->cantidad,
            'idCategoria' => $this->categoria_producto,
            //es para que nos retorne las relaciones.
            // 'categoria_producto' => EventoResource::make($this->whenLoaded('categoria_producto')),        
        ];
    }
}
