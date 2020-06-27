<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CalificacionActualizada extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $calificacion_unidad;

    /**
     * Create a new message instance.
     *
     * @param mixed $calificacion_unidad
     */
    public function __construct($calificacion_unidad)
    {
        $this->calificacion_unidad = $calificacion_unidad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.calificacionActualizada');
    }
}
