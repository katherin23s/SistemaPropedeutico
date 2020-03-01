<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    public $fillable = [
        'numero',
        'fecha_inicio',
        'fecha_final',
    ];
    public static $rules = [
        'numero' => 'required|max:255|min:1',
        'fecha_inicio' => 'required|date',
        'fecha_final' => 'required|date',
    ];
    protected $casts = [
        'id' => 'integer',
        'numero' => 'string',
    ];
    //Es para que Carbon tambien trata a las siguientes propiedades como fechas
    protected $dates = [
        'fecha_inicio',
        'fecha_final'
    ];
    
}
