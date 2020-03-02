<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
    //Esta nos obtendra todos los departamentos que le pertenezcan a este plantel
    //utiliza los IDs de ambas tablas para hacer la relacion
    public function departamentos()
    {
        return $this->hasMany('App\Departamento');
    }

    protected $table = 'planteles';

    public $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'correo'
    ];
    public static $rules = [
        'nombre' => 'required|max:255|min:5',
        'direccion' => 'required|max:255|min:5',
        'telefono' => 'max:255',
        'correo' => 'required|max:255|min:5|email',
    ];
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'correo' => 'string',
    ];
}
