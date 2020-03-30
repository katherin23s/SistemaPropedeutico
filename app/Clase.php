<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    public $fillable = [
        'materia',
        'hora_inicio',
        'hora_final',
        'dias',
        'salon',
        'capacidad',
        'grupo_id',
        'materia_id',
        'docente_id',
    ];
    public static $rules = [
        'materia' => 'required|max:255|min:1',
        'hora_inicio' => 'required',
        'hora_final' => 'required',
        'dias' => 'required|max:255|min:1',
        'salon' => 'required|max:255|min:1',
        'capacidad' => 'required|integer|min:1',
        'grupo_id' => 'required|integer',
        'materia_id' => 'required|integer',
        'docente_id' => 'required|integer',
    ];
    protected $casts = [
        'id' => 'integer',
        'materia' => 'string',
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
