<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public $fillable = [
        'nombre',
        'clave',
        'creditos',
    ];
    public static $rules = [
        'nombre' => 'required|max:255|min:5',
        'clave' => 'required|max:255|min:1',
        'creditos' => 'required|integer',
    ];
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'clave' => 'string',
        'creditos' => 'integer',
    ];
}
