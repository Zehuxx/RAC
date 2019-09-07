<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'=>'required|unique:car_brands,name,'.$this->id.'|max:45'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es obligatorio',
            'name.unique' => 'La marca ya exite ya existe',
            'name.max' => 'Solo se permiten 45 caracteres'
        ];
    }
}
