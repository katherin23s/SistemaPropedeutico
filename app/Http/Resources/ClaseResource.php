<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClaseResource extends JsonResource
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
            'grupo' => $this->grupo->numero,
            'semestre' => $this->grupo->semestre->materia,
            'carrera' => $this->grupo->carrera->nombre,
            'materia' => $this->materia,
            'salon' => $this->salon,
            'horario' => $this->horarioCompleto(),
        ];
    }
}
