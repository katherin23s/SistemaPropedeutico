<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarDocenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'numero_empleado' => 'required|max:255|min:1',
            'nombre' => 'required|max:255|min:1',
            'direccion' => 'max:255',
            'telefono' => 'max:255',
        ];
    }
}
