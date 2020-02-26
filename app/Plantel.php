<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
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
