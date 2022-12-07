<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteStoreRequest extends FormRequest
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
            'primer_nombre' => 'required|max:100|min:2',
            'primer_apellido' => 'required|max:100|min:2',
            'cui' => 'required|max:13|min:13',
            'fecha_nacimiento' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'fecha_nacimiento.required' => 'El campo fecha nacimiento es requerido',
            'fecha_nacimiento.date' => 'El campo fecha nacimiento debe ser una fecha'
        ];

    }
}
