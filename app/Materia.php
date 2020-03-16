<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public $fillable = [
        'nombre',
        'clave',
        'creditos',
        'unidades',
        'carrera_id',
    ];
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'clave' => 'string',
        'creditos' => 'integer',
        'unidades' => 'integer',
        'carrera_id' => 'integer',
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }
}
