<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotaCompraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'costo_total' => $this->costo_total,
            'hora' => $this->hora,
            'fecha' => $this->fecha, 
            'detalle_compras' => ProductoResource::collection($this->whenLoaded('detalle_compras')),        
            
        ];


        // //para la api, por el cual se va poder filtrar
        // //NOMBRES DE LAS RELACIONES
        // protected $allowIncluded = ['proveedor_id', 'materia_prima', 'detalle_compras'];
        // //ATRIBUTO POR EL CUAL SE VA A BUSCAR
        // protected $allowFilter = ['id', 'proveedor_id', 'costo_total', 'hora', 'fecha' ];
        // //ATRIBUTO POR LOS CUALES SE PUEDEN ORDENAR
        // protected $allowSort = ['id', 'proveedor_id', 'costo_total', 'hora', 'fecha' ];
    }
}
