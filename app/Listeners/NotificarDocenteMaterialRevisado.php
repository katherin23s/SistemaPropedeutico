<?php

namespace App\Listeners;

use App\Events\MaterialRevisado;

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
    }
}
