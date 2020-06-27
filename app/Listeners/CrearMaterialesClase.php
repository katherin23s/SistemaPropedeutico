<?php

namespace App\Listeners;

use App\Actions\CrearMaterialesClase as ActionsCrearMaterialesClase;
use App\Events\ClaseRegistrada;

class CrearMaterialesClase
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
    public function handle(ClaseRegistrada $event)
    {
        $crear_materiales = new ActionsCrearMaterialesClase($event->clase);
        $crear_materiales->crearMateriales();
    }
}
