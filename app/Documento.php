<?php

namespace App;

use App\Events\DocumentoRevisado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Documento extends Model
{
    use Notifiable;
    public $fillable = [
        'alumno_id',
        'nombre',
        'fecha',
        'ubicacion',
        'estado',
        'comentarios',
    ];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => DocumentoRevisado::class,
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
