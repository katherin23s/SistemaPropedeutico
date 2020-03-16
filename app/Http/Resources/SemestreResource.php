<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SemestreResource extends JsonResource
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
            'numero' => $this->numero,
            'periodo' => $this->periodo(),
            'fecha_inicio' => $this->fecha_inicio->format('Y-m-d'),
            'fecha_final' => $this->fecha_final->format('Y-m-d'),
        ];
    }
}
