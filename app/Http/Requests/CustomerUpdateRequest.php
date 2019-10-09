<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool 
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $today = now()->format('Y-m-d');

        if (isset($this->slc_cuenta)) {
            return [
                'company_name'=>'required',
                'rtn'=>'required|regex:/(^(\d{14})$)/u',
                'name'=>'required',
                'last_name'=>'required',
                'identification_card'=>'required|unique:persons,identification_card,'.$this->id.'|regex:/(^(\d{4}\-\d{4}\-\d{5})$)/u',
                'phone'=>'required|unique:persons,phone,'.$this->id.'|regex:/(^(\d{4}\-\d{4})$)/u',
                'home_address'=>'required|max:45',
                'gender'=>'required|in:M,F',
                'birth_date'=>'required|before:'.$today
            ];
        } else {
            return [
                'name'=>'required',
                'last_name'=>'required',
                'identification_card'=>'required|unique:persons,identification_card,'.$this->id.'|regex:/(^(\d{4}\-\d{4}\-\d{5})$)/u',
                'phone'=>'required|unique:persons,phone,'.$this->id.'|regex:/(^(\d{4}\-\d{4})$)/u',
                'home_address'=>'required|max:45',
                'gender'=>'required|in:M,F',
                'birth_date'=>'required|before:'.$today
            ];
        }
    }

    public function messages()
    {
        return [
            'slc_cuenta.numeric'=>'Este valor no es permitido',
            'slc_cuenta.max'=>'Este valor no es permitido',
            'slc_cuenta.min'=>'Este valor no es permitido',
            'company_name.required' => 'Este campo es obligatorio.',
            'rtn.required'=>'Este campo es obligatorio.',
            'rtn.regex'=>'Se requieren 14 digitos.',
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'identification_card.required' => 'El número de indentidad es obligatorio',
            'identification_card.unique' => 'El número de indentidad ya esta en uso',
            'identification_card.regex' => 'No tiene el formato dddd-dddd-ddddd',

            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.unique' => 'El número de teléfono ya esta en uso',
            'phone.regex' => 'No tiene el formato dddd-dddd',

            'home_address.required' =>'La direción es obligatoria',
            'home_address.max' =>'La dirección es muy extensa',
            'gender.required' => 'El sexo es obligatorio',
            'gender.in' => 'El sexo es F o M',
            'birth_date.required' => 'La fecha de nacimiento es obligatoria',
            'birth_date.before' => 'La fecha es incorrecta',
        ];
    }
}
