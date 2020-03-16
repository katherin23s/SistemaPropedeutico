<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    public $fillable = [
        'alumno_id',
        'clase_id',
        'promedio',
    ];
    protected $casts = [
        'id' => 'integer',
        'alumno_id' => 'integer',
        'clase_id' => 'integer',
        'promedio' => 'decimal:5',
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }

    public function clase()
    {
        return $this->belongsTo('App\Clase');
    }

    public function getPromedioAttribute($value)
    {
        return number_format($value, 2);
    }
}
