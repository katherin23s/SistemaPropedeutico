<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GrupoResource extends JsonResource
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
            'semestre' => $this->semestre->numero,
            'carrera' => $this->carrera->nombre,
            'numero' => $this->numero,
            'hora_inicio' => $this->hora_inicio->toTimeString(),
            'hora_final' => $this->hora_final->toTimeString(),
        ];
    }
}
