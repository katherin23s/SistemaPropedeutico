<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public $fillable = [
        'alumno_id',
        'nombre',
        'fecha',
        'ubicacion',
        'estado',
        'comentarios',
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }

    public function estado()
    {
        switch ($this->estado()) {
            case 0:
                return 'Pendiente de revisión';

                break;
            case 1:
                return 'Aprobado';

                break;
            case 2:
                return 'Rechazado';

                break;
            case 3:
                return 'Pendiente de enviar';

                break;
            default:
                // code...
                break;
        }
    }
}
