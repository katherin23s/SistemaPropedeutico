<?php

namespace App\Listeners;

use App\Events\AlumnoRegistrado;

class CrearCalificacionesAlumno
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param object $event
     */
    public function handle(AlumnoRegistrado $event)
    {
        $alumno = $event->alumno;
    }
}
