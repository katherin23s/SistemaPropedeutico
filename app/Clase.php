<?php

namespace App;

use App\Events\ClaseRegistrada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clase extends Model
{
    use Notifiable;
    public $fillable = [
        'clave',
        'hora_inicio',
        'hora_final',
        'dias',
        'salon',
        'capacidad',
        'grupo_id',
        'materia_id',
        'docente_id',
        'unidades',
        'creditos',
    ];
    protected $casts = [
        'id' => 'integer',
        'clave' => 'string',
        'salon' => 'string',
        'dias' => 'string',
        'capacidad' => 'integer',
        'materia_id' => 'integer',
        'grupo_id' => 'integer',
        'docente_id' => 'integer',
    ];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ClaseRegistrada::class,
    ];
    protected $dates = ['hora_inicio', 'hora_final'];

    //Una clase pertenece a un grupo
    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    //Una clase pertenece a una materia
    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    //Una clase pertenece a un docente
    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }

    public function materiales() //documentos del docente
    {
        return $this->hasMany('App\Material');
    }

    public function horarioCompleto()
    {
        return $this->hora_inicio->toTimeString().' - '.$this->hora_final->toTimeString();
    }

    public function calificaciones()
    {
        return $this->hasMany('App\Calificacion');
    }
}
