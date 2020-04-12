<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
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

    public function horarioCompleto()
    {
        return $this->hora_inicio->toTimeString().' - '.$this->hora_final->toTimeString();
    }
}
