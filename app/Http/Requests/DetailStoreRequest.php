<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;

class DetailStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $today = now()->format('Y-m-d H:i');
        return [
            'tipomovimiento'=>'exists:movements,id',
            'fechasalida'=>'required|after_or_equal:'.$today,
            'fechamodificada'=>[
                function($attribute, $value, $fail) {
                    $fechasalida=strtotime($this->fechasalida);
                    $fechareeingreso=strtotime($this->fechareeingreso);
                    $tipomovimiento=(int)$this->tipomovimiento;
                    //3 = ARRENDAMIENTO
                    // SI ES MOVIMIENTO DE ARRENDAMIENTOES NECESARIO UNA FECHA DE REEINGRESO Y TAMBIEN ESTA DEBE SER MAYOR AL LA FECHA EN QUE SE HIZO EL DETALLE
                    if ($tipomovimiento===3) {
                        //dd($fechasalida,$fechareeingreso);
                        if ($fechasalida>$fechareeingreso) {
                            return $fail('La fecha de reeingreso debe ser igual o posterior a la fecha de salida');
                        }
                    }
                },
            ],
            'id_carro'=>['required',
                function($attribute, $value, $fail) {

                    $idcarro=(int)$this->id_carro;
                    $idtipo=(int)$this->tipomovimiento;
                    //EN CASO DE QUE EL MOVIMIENTO SEA ENTRADA DEBEMOS PERMITIR EL MOVIMIENTO
                    //AUNQUE EL CARRO NO ESTE DISPONIBLE 
                        if($attribute == 'id_carro'){
                            //4 = ENTRADA
                            //2 = ROBO
                            $car = Car::find($idcarro);// SE VERIFICA QUE EL CARRO EXISTA
                            if ($car!==null) {
                                if ($idtipo!==4 && $idtipo!==2) {//SE VERIFICA QUE EL CARRO ESTE DISPONIBLE 
                                                                 //PARA UN MOVIMIENTO   
                                    $car = Car::where('id','=',$idcarro)->where('state_id','=', 1)->first();
                                    if($car === null)
                                        return $fail('Este carro no esta disponible.');
                                }
                            }else{
                                return $fail('Carro no encontrado.');
                            }
                        }
                },
            ],
            'id_orden'=>'exists:orders,id',
        ];
    }


    public function messages()
    {
        return [
            'fechasalida.required'=>"La fecha de salida es obligatoria.",
            'fechasalida.after_or_equal'=> "La fecha de salida debe ser igual o posterior a la fecha actual",
            'id_orden.exists'=> "Esa orden no existe",
            'tipomovimiento.exists'=> "Tipo de movimiento invalido.",
        ];
    }
}
