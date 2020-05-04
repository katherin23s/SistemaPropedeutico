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

    public function clases()
    {
        return $this->hasMany('App\Clase');
    }
}
