<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MateriaPrimaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'nombre' => $this->evento_id ,
            'tipo' => $this->tipo ,
            'descripcion' => $this->nombre ,
            'tamaño' => $this->tamaño,
            'peso' => $this->peso ,
            'color' => $this->color ,
            'cantidad' => $this->cantidad ,
            'idCategoriaMP' => $this->idCategoriaMP,
        ];
    }
}
