<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalStoreRequest extends FormRequest
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

            'nombres' => 'required',
            'apellidos' => 'required',
            'tipo' => 'required',
            'email' => 'required|email',
            'contrasenia' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'contrasenia.required' => 'El campo contraseña es requerido',
            'contrasenia.min' => 'El campo contraseña debe tener al menos 5 caracteres'
        ];
    }
}
