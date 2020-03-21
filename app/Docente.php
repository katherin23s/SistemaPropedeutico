<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Docente extends Authenticatable
{
    use Notifiable;
    public $fillable = [
        'numero_empleado',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'password',
        'departamento_id',
    ];
    public static $rules = [
        'numero_empleado' => 'required|max:255|min:1',
        'nombre' => 'required|max:255|min:1',
        'direccion' => 'max:255',
        'telefono' => 'max:255',
        'email' => 'email',
        'password' => 'required|max:255|min:1',
        'departamento_id' => 'required|integer',
    ];
    protected $guard = 'docente';
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
        'numero_empleado' => 'string',
        'nombre' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'email' => 'string',
        'departamento_id' => 'integer',
    ];

    //Un docente pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }
}
