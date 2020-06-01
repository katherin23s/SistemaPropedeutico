<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $fillable = [
        'clase_id',
        'nombre',
        'fecha',
        'ubicacion',
        'estado',
        'comentarios',
    ];

    public function clase()
    {
        return $this->belongsTo('App\Clase');
    }

    public function estado()
    {
        switch ($this->estado) {
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
