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
            'tipoorden'=>'required|integer|exists:order_types,id',
            'cliente'=>'required|integer|exists:customers,id',
            
        ];
    }


    public function messages()
    {
        return [
            'tipoorden.required'=>"El campo 'Tipo orden' es obligatorio",
            'tipoorden.integer'=>'Valor no permitido',
            'tipoorden.exists'=>"Valor no permitido",
            'cliente.required'=>"El campo 'cliente' es obligatorio",
            'cliente.integer'=>"Valor no permitido",
            'cliente.exists'=>"Valor no permitido",
        ];
    }
}
