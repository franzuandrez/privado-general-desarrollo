<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
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
            'tipo' => 'required',
            'permission' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'El campo tipo es requerido',
            'permission.required' => 'Debe tener al menos un permiso'
        ];
    }
}
