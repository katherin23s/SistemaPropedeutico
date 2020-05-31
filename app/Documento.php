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

    protected $dates = ['fecha'];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
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

    public function clase()
    {
        switch ($this->estado) {
            case 0:
                return 'bg-warning';

                break;
            case 1:
                return 'bg-success';

                break;
            case 2:
                return 'bg-danger';

                break;
            case 3:
                return 'bg-yelow';

                break;
            default:
                // code...
                break;
        }
    }
}
