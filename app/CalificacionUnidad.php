<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalificacionUnidad extends Model
{
    public $fillable = [
        'calificacion_id',
        'unidad',
        'valor',
        'habilitada',
    ];
    protected $casts = [
        'id' => 'integer',
        'calificacion_id' => 'integer',
        'unidad' => 'string',
        'valor' => 'decimal:5',
        'habilitada' => 'boolean',
    ];

    public function calificacion()
    {
        return $this->belongsTo('App\Calificacion');
    }
}
