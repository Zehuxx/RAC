<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmployeeUpdateRequest extends FormRequest
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
      $today = now()->format('Y-m-d');
        return [
            'nombre'=>'required',
            'apellido'=> 'required',
            'identidad'=>array('required','unique:persons,identification_card,'.$this->id.',id,deleted_at,NULL','regex:/(^[01][0-8][0-9]{2}-((19)[4-9][0-9]|(20)[0-9]{2})-[0-9]{5}$)/u'),
            'telefono'=>array('required','regex:/(^[0-9]{4}-[0-9]{4}$)/u'),
            'direccion'=>'required',
            'sexo'=>['required',
                function($attribute, $value, $fail) {
                        $value=(int)$value;
                        if ($value<1 || $value>2) {
                              return $fail('Sexo seleccionado invalido');
                        }
                }
            ],
            'fechan'=>'required|before_or_equal:'.$today,
            'salario'=>'numeric',
            'rol'=>'exists:roles,id',
            'email'=>'required|unique:users,email,'.$this->id.',id,deleted_at,NULL',
            'passworda'=>[
                function($attribute, $value, $fail) {
                        $user=User::find($this->id);
                        if (!Hash::check($this->passworda,$user->password)) {
                              return $fail('Contraseña incorrecta');
                        }
                }
            ],
            'password'=>[
                function($attribute, $value, $fail) {
                    if (strlen($this->passworda) && $this->passworda!=null) {
                        if (strlen($this->password)<8) {
                            return $fail('Contraseña deber contener al menos 8 caracteres');
                        }
                    }  
                }   
            ],
        ];

    }

    public function messages()
    {
        return [
            'nombre.required'=>'El campo :attribute es obligatorio',
            'apellido.required'=> 'El campo :attribute es obligatorio',
            'identidad.required'=>'El campo :attribute es obligatorio',
            'identidad.unique'=>'La :attribute ingresada ya esta registrada',
            'identidad.regex'=>'La :attribute ingresada es invalida',
            'telefono.required'=>'El campo :attribute es obligatorio',
            'direccion.required'=>'El campo :attribute es obligatorio',
            'telefono.regex'=>'El :attribute ingresado es invalido',
            'sexo.required'=>'EL campo :attribute es obligatorio',
            'fechan.required'=>'El campo fecha nacimiento es obligatorio',
            'fechan.before_or_equal'=>'La fecha nacimiento ingresada es invalida',
            'salario.numeric'=>'El :attribute ingresado es invalido',
            'rol.exists'=>'El :attribute seleccionado es invalido',
            'email.required'=>'El campo :attribute es obligatorio',
            'email.unique'=>'El :attribute ingresado ya esta registrado'
            
        ];
    }
}

