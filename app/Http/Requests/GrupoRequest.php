<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
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
            'numero' => 'required|max:255|min:1',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'semestre_id' => 'required|integer',
            'carrera_id' => 'required|integer',
        ];
    }
}
