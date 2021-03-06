<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cliente'=>'exists:customers,id',
        ];
    }
 

    public function messages()
    {
        return [
            'cliente.exists'=>'Valor no permitido',
        ];
    }
}
