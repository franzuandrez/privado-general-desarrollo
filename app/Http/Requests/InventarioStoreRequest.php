<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioStoreRequest extends FormRequest
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
            'tipo_movimiento' => 'required',
            'medicamento' => 'required',
            'presentacion' => 'required',
            'total' => 'required|numeric',
            'fecha_vencimiento' => 'required|date',
            'lote' => 'required|max:45:min:1'
        ];
    }
}
