<?php

namespace App\Events;

use App\Clase;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClaseRegistrada
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $clase;

    /**
     * Create a new event instance.
     */
    public function __construct(Clase $clase)
    {
        $this->clase = $clase;
    }
}
