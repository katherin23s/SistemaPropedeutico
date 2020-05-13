<?php

namespace App;

use App\Events\AlumnoRegistrado;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Alumno extends Authenticatable
{
    use Notifiable;
    public $fillable = [
        'numero_alumno',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'password',
        'escuela_procedencia',
        'grupo_id',
    ];
    public static $rules = [
        'numero_alumno' => 'required|max:255|min:1',
        'nombre' => 'required|max:255|min:1',
        'direccion' => 'max:255',
        'telefono' => 'max:255',
        'email' => 'email',
        'password' => 'required|max:255|min:1',
        'escuela_procedencia' => 'max:255',
        'grupo_id' => 'required|integer',
    ];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => AlumnoRegistrado::class,
    ];
    protected $guard = 'alumno';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'id' => 'integer',
        'numero_alumno' => 'string',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'email' => 'string',
        'escuela_procedencia' => 'string',
        'grupo_id' => 'integer',
    ];

    //Un alumno pertenece a un grupo
    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    public function calificaciones()
    {
        return $this->hasMany('App\Calificacion');
    }
}
