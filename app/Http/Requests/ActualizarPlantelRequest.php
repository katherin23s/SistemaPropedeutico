<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPlantelRequest extends FormRequest
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
            'plantel_id' => 'required',
            'nombre' => 'required|max:255|min:5',
            'direccion' => 'required|max:255|min:5',
            'telefono' => 'max:255',
            'correo' => 'required|max:255|min:5|email',
        ];
    }
}
