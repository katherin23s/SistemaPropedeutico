<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseRequest extends FormRequest
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
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'clave' => 'required|max:255',
            'dias' => 'required|max:255|min:1',
            'salon' => 'required|max:255|min:1',
            'capacidad' => 'required|integer|min:1',
            'grupo_id' => 'required|integer',
            'materia_id' => 'required|integer',
            'docente_id' => 'required|integer',
        ];
    }
}
