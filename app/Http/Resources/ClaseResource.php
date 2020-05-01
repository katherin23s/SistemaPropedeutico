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
            'clave' => $this->clave,
            'grupo' => $this->grupo->numero,
            'docente' => $this->docente->nombre,
            'carrera' => $this->grupo->carrera->nombre,
            'materia' => $this->materia->nombre,
            'salon' => $this->salon,
            'dias' => $this->dias,
            'capacidad' => $this->capacidad,
            'horario' => $this->horarioCompleto(),
            'hora_inicio' => $this->hora_inicio->toTimeString(),
            'hora_final' => $this->hora_final->toTimeString(),
        ];
    }
}
