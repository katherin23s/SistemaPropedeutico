<?php

namespace App\Actions;

use App\Alumno;
use App\Documento;
use Carbon\Carbon;

class CrearDocumentosAlumno
{
    private $alumno;
    private $cantidad_documentos = 5;

    public function __construct(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }

    public function crearDocumentos()
    {
        $fecha = Carbon::today();
        for ($i = 0; $i < $this->cantidad_documentos; ++$i) {
            $documento = new Documento();
            $documento->alumno_id = $this->alumno->id;
            $documento->nombre = 'Nombre del doc '.$i;
            $documento->fecha = $fecha;
            $documento->estado = 3;
            $documento->ubicacion = '';
            $documento->save();
        }
    }
}
