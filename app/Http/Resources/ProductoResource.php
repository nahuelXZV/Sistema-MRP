<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'nombre' => $this->evento_id ,
            'descripcion' => $this->nombre , 
            'color' => $this->direccion ,
            'tamaño' => $this->telefono,
            'estado' => $this->capacidad ,
            'peso' => $this->peso ,
            'especificacion' => $this->especificacion,
            'costo_produccion' => $this->costo_produccion,
            //es para que nos retorne las relaciones.
            // 'evento' => EventoResource::make($this->whenLoaded('evento')),
            //  'procesosA' => ProcesoResource::collection($this->whenLoaded('procesosA')),            
        ];
    }
}
