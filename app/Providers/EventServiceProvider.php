<?php

namespace App\Providers;

use App\Events\AlumnoRegistrado;
use App\Events\DocumentoRevisado;
use App\Listeners\CrearCalificacionesAlumno;
use App\Listeners\CrearDocumentosAlumno;
use App\Listeners\NotificarAlumnoDocumentoRevisado;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AlumnoRegistrado::class => [
            CrearCalificacionesAlumno::class,
            CrearDocumentosAlumno::class,
        ],
        DocumentoRevisado::class => [
            NotificarAlumnoDocumentoRevisado::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
