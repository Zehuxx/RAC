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
            'marca'=>'integer',
            'modelo'=>'integer',
            'chasis'=>'required|max:45',
            'placa'=>'required|max:45|unique:cars,license_plate',
            'tipo'=>'integer',
            'estado'=>'integer',
            'ubicacion'=>'integer',
            'year'=>'required',
            
        ];
    }


    public function messages()
    {
        return [
            'marca.integer'=>'Valor no permitido',
            'modelo.integer'=>'Valor no permitido',
            'chasis.required'=>"El campo 'Chasis' es obligatorio",
            'chasis.max'=>'Caracteres maximos permitidos 45',
            'placa.required'=>"El campo 'Placa' es obligatorio",
            'year.required'=>"El campo 'Año' es obligatorio",
            'placa.max'=>'Caracteres maximos permitidos 45',
            'placa.unique'=>'Placa ya registrada.',
            'tipo.integer'=>'Valor no permitido',
            'estado.integer'=>'Valor no permitido',
            'ubicacion.integer'=>'Valor no permitido',
            'imagen.max'=>"La foto no debe tener mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'imagen.image'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'imagen.mimes'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
        ];
    }
}
