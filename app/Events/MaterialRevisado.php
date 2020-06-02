<?php

namespace App\Events;

use App\Material;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MaterialRevisado
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $material;

    /**
     * Create a new event instance.
     */
    public function __construct(Material $material)
    {
        $this->material = $material;
    }
}
