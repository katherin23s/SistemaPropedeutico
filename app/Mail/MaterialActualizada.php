<?php

namespace App\Mail;

use App\Material;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MaterialActualizada extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $material;

    /**
     * Create a new message instance.
     */
    public function __construct(Material $material)
    {
        $this->material = $material;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.materialRevisado');
    }
}
