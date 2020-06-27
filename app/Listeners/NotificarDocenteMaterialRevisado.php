<?php

namespace App\Listeners;

use App\Events\MaterialRevisado;
use App\Mail\MaterialActualizada;
use Illuminate\Support\Facades\Mail;

class NotificarDocenteMaterialRevisado
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
    public function handle(MaterialRevisado $event)
    {
        $material = $event->material;
        Mail::to($material->clase->docente->email)->queue(
            new MaterialActualizada($material)
        );
    }
}
