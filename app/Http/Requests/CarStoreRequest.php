<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imagen'=>'image|mimes:jpeg,bmp,jpg,png|max:4096',
            'marca'=>'integer|exists:car_brands,id',
            'modelo'=>'integer|exists:models,id',
            'chasis'=>'required|max:20',
            'placa'=>'required|max:10|unique:cars,license_plate',
            'tipo'=>'integer|exists:car_types,id',
            'year'=>'required',
            
        ];
    }


    public function messages()
    {
        return [
            'marca.integer'=>'Valor no permitido',
            'marca.exists'=>'Valor no permitido',
            'modelo.integer'=>'Valor no permitido',
            'modelo.exists'=>'Valor no permitido',
            'chasis.required'=>"El campo 'Chasis' es obligatorio",
            'chasis.max'=>'Caracteres maximos permitidos 20',
            'placa.required'=>"El campo 'Placa' es obligatorio",
            'year.required'=>"El campo 'Año' es obligatorio",
            'placa.max'=>'Caracteres maximos permitidos 10',
            'placa.unique'=>'Placa ya registrada.',
            'tipo.integer'=>'Valor no permitido',
            'tipo.exists'=>'Valor no permitido',
            'imagen.max'=>"La foto no debe tener mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'imagen.image'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'imagen.mimes'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
        ];
    }
}
