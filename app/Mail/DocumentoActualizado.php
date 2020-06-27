<?php

namespace App\Mail;

use App\Documento;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DocumentoActualizado extends Mailable
{
    use Queueable;
    use SerializesModels;
    public $documento;

    /**
     * Create a new message instance.
     */
    public function __construct(Documento $documento)
    {
        $this->documento = $documento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.documentoRevisado');
    }
}
