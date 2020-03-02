<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //Un alumno pertenece a una carrera
    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

    public $fillable = [
        'numero_alumno',
        'nombre',
        'direccion',
        'telefono',
        'correo',
        'escuela_procedencia',
        'carrera_id',
    ];
    public static $rules = [
        'numero_alumno' => 'required|max:255|min:1',
        'nombre' => 'required|max:255|min:1',
        'direccion' => 'max:255',
        'telefono' => 'max:255',
        'correo' => 'email',
        'escuela_procedencia' => 'max:255',
        'carrera_id' => 'required|integer',
    ];
    protected $casts = [
        'id' => 'integer',
        'numero_alumno' => 'string',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'escuela_procedencia' => 'string',
        'carrera_id' => 'integer',
    ];
}
