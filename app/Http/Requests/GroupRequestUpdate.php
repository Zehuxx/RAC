<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequestUpdate extends FormRequest
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
            'name' => 'required|unique:groups,name,'.$this->id.',id,deleted_at,NULL',
            'car_type'=>'required|exists:car_types,id',
            'comission'=> ['required', 'regex:/^(([0-9]{1}[.]{1}[0-9]{2})|([0-9]{2}[.]{1}[0-9]{2})|([0-9]{1})|([0-9]{2}))$/u'],
            'goal'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es obligatorio.',
            'name.unique' => 'El nombre ya esta en uso.',
            'car_type.required' => 'Este campo es obligatorio.',
            'car_type.exists' => 'Valor no permitido.',
            'comission.required' => 'Este campo es obligatorio.',
            'comission.regex' => 'Valores permitidos ejem: n, nn, n.nn, nn.nn, n.nn',
            'goal.required' => 'Este campo es obligatorio.',
             'goal.numeric' => 'Este campo debe ser numerico.',
        ];
    }
}
