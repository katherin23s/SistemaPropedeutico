<?php

namespace App\Events;

use App\Alumno;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AlumnoRegistrado
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $alumno;

    /**
     * Create a new event instance.
     */
    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }
}
