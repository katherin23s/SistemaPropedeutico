<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_alumno' => 'required|max:255|min:1',
            'nombre' => 'required|max:255|min:1',
            'direccion' => 'max:255',
            'telefono' => 'max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:alumnos'],
            'password' => 'required|max:255|min:1',
            'escuela_procedencia' => 'max:255',
            'grupo_id' => 'required|integer',
        ];
    }
}
