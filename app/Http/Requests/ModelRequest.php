<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
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
            'name'=>'required|unique:models,name,'.$this->id.'|max:45'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es obligatorio',
            'name.unique' => 'El modelo ya existe',
            'name.max' => 'Solo se permiten 45 caracteres'
        ];
    }
}
