<?php

namespace App\Listeners;

use App\Actions\CrearDocumentosAlumno as ActionsCrearDocumentosAlumno;
use App\Events\AlumnoRegistrado;

class CrearDocumentosAlumno
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
        $crear_documentos = new ActionsCrearDocumentosAlumno($event->alumno);
        $crear_documentos->crearDocumentos();
    }
}
