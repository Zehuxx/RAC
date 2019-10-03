<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fechafinal'=>'after_or_equal:fechainicial',
            'fechainicial'=>'required',
            'slc-reporte'=>'required|integer|between:1,2',
            'slc-grafica'=>'required|integer|between:1,3',
            
        ];
    }


    public function messages()
    {
        return [
            'fechafinal.after_or_equal'=>'Fecha final debe ser mayor o igual a Fecha inicial.',
            'fechainicial.required'=>'fecha inicial obligatoria.',
            'slc-reporte.required'=>'Campo obligatorio.',
            'slc-reporte.integer'=>'Valor no permitido.',
            'slc-reporte.between'=>"Valor no permitido.",
            'slc-grafica.required'=>'Campo obligatorio.',
            'slc-grafica.integer'=>'Valor no permitido.',
            'slc-grafica.between'=>"Valor no permitido.",
        ];
    }
}
