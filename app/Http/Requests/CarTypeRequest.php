<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarTypeRequest extends FormRequest
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
            'name'=>'required|unique:car_types,name,'.$this->id.'|max:45',
            'cost'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El modelo es obligatorio',
            'name.unique' => 'El tipo ya exite ya existe',
            'name.max' => 'Solo se permiten 45 caracteres',
            'cost.required'=>'El costo es obligatorio',
            'cost.numeric'=>'Solo se aceptan números',
        ];
    }
}
