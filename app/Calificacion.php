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
    protected $table = 'calificaciones';
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

    public function calificaciones()
    {
        return $this->hasMany('App\CalificacionUnidad');
    }

    public function promedio()
    {
        return number_format($this->promedio, 2);
    }

    public function calcularPromedio()
    {
        $this->promedio = $this->calificaciones->where('habilitada', 1)->avg('valor');
        $this->save();
    }
}
