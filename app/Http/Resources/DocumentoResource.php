<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'fecha' => $this->fecha->format('d-m-Y'),
            'ubicacion' => $this->ubicacion,
            'estado' => $this->estado(),
            'comentarios' => $this->comentarios,
        ];
    }
}
