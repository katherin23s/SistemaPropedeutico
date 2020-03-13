<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function plantel()
    {
        return $this->belongsTo('App\Plantel');
    }

    //Un departamento tiene muchas carreras
    public function carreras()
    {
        return $this->hasMany('App\Carrera');
    }

    //Un departamento tiene muchos docentes
    public function docentes()
    {
        return $this->hasMany('App\Docente');
    }

    public $fillable = [
        'nombre',
        'plantel_id',
    ];
    public static $rules = [
        'nombre' => 'required|max:255|min:5',
        'plantel_id' => 'required|integer'
    ];
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'plantel_id' => 'integer',
    ];
}
