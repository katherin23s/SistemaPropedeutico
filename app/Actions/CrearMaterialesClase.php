<?php

namespace App\Actions;

use App\Clase;
use App\Material;
use Carbon\Carbon;

class CrearMaterialesClase
{
    private $clase;
    private $cantidad_materiales = 5;

    public function __construct(Clase $clase)
    {
        $this->clase = $clase;
    }

    public function crearMateriales()
    {
        $fecha = Carbon::today();
        for ($i = 0; $i < $this->cantidad_materiales; ++$i) {
            $material = new Material();
            $material->clase_id = $this->clase->id;
            $material->nombre = 'Nombre del material '.$i;
            $material->fecha = $fecha;
            $material->estado = 3;
            $material->ubicacion = '';
            $material->save();
        }
    }
}
