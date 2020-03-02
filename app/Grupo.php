<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //Un grupo pertenece a un semestre
    public function semestre()
    {
        return $this->belongsTo('App\Semestre');
    }

    //Un grupo pertenece a una carrera
    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

    public $fillable = [
        'numero',
        'hora_inicio',
        'hora_final',
        'semestre_id',
        'carrera_id',
    ];
    public static $rules = [
        'numero' => 'required|max:255|min:1',
        'hora_inicio' => 'required',
        'hora_final' => 'required',
        'semestre_id' => 'required|integer',
        'carrera_id' => 'required|integer',
    ];
    protected $casts = [
        'id' => 'integer',
        'numero' => 'string',
        'carrera_id' => 'integer',
        'semestre_id' => 'integer',
    ];
    protected $dates = ['hora_inicio', 'hora_final'];
}
