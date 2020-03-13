<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //Una carrera pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    //Una carrera tiene muchos grupos
    public function grupos()
    {
        return $this->hasMany('App\Grupo');
    }

    public $fillable = [
        'nombre',
        'numero_serie',
        'departamento_id',
    ];
    public static $rules = [
        'nombre' => 'required|max:255|min:5',
        'numero_serie' => 'required|max:255|min:1',
        'departamento_id' => 'required|integer',
    ];
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'numero_serie' => 'string',
        'departamento_id' => 'integer',
    ];
}
