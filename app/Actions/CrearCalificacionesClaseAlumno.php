<?php

namespace App\Actions;

use App\Alumno;
use App\Calificacion;
use App\CalificacionUnidad;
use App\Clase;

class CrearCalificacionesClaseAlumno
{
    private $alumno;
    private $clases;

    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
        $this->clases = Clase::where('grupo_id', $alumno->grupo_id)->get();
    }

    public function crearCalificaciones()
    {
        foreach ($this->clases as $clase) {
            $calificacion = new Calificacion();
            $calificacion->alumno_id = $this->alumno->id;
            $calificacion->clase_id = $clase->id;
            $calificacion->promedio = 0;
            $calificacion->save();

            for ($i = 0; $i < $clase->unidades; ++$i) {
                $calificacion_unidad = new CalificacionUnidad();
                $calificacion_unidad->calificacion_id = $calificacion->id;
                $calificacion_unidad->unidad = $i + 1;
                $calificacion_unidad->valor = 0;
                $calificacion_unidad->habilitada = false;
                $calificacion_unidad->save();
            }
        }
    }
}
