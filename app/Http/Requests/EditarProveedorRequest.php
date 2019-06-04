<?php

namespace SistemadeVentas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarProveedorRequest extends FormRequest
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
        'nombre'=>'required|max:35',
        'direccion'=>'required|max:55',
        'ciudad'=>'required|max:25',
        'cod_post'=>'required|digits:5',
        'telefono'=>'required|max:15'
        ];
    }
}
