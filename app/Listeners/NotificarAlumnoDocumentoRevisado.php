<?php

namespace App\Listeners;

use App\Events\DocumentoRevisado;
use App\Mail\DocumentoActualizado;
use Illuminate\Support\Facades\Mail;

class NotificarAlumnoDocumentoRevisado
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
    public function handle(DocumentoRevisado $event)
    {
        $documento = $event->documento;
        Mail::to($documento->alumno->email)->queue(
            new DocumentoActualizado($documento)
        );
    }
}
