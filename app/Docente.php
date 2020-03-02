<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //Un docente pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public $fillable = [
        'numero_empleado',
        'nombre',
        'direccion',
        'telefono',
        'correo',
        'departamento_id',
    ];
    public static $rules = [
        'numero_empleado' => 'required|max:255|min:1',
        'nombre' => 'required|max:255|min:1',
        'direccion' => 'max:255',
        'telefono' => 'max:255',
        'correo' => 'email',
        'departamento_id' => 'required|integer',
    ];
    protected $casts = [
        'id' => 'integer',
        'numero_empleado' => 'string',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
        'departamento_id' => 'integer',
    ];
}
