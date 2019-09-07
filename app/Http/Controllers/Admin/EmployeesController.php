<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;
use Illuminate\Support\facades\Input;

class EmployeesController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/add_employe')->with('holders',['name'=>'nombre', 'last'=>'apellido','id'=>'NNNN-NNNN-NNNNN','tel'=>'NNNN-NNNN','addr'=>'ej. Col.', 'birthdate'=>'date','salary'=>'NNNNN','commission'=>'NN','goal'=>'NNNN','email'=>'email']);
    }
    /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=\App\Models\Employee::select('employees.*','users.*','persons.*','roles.name as rl','sale_goals.commission as cm','sale_goals.sale_goal as sg')
        ->join('users','users.id','=','employees.id')
        ->join('persons','persons.id','=','employees.id')
        ->join('roles','users.role_id','=','roles.id')
        ->join('sale_goals','sale_goals.employee_id','=','employees.id')
        ->get();

        return view('admin/employes')
        ->with('employees', $employees);
    }

  

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'apellido'=> 'required',
            'identidad'=>'required|unique:persons,identification_card|numeric',
            'telefono'=>'required',
            'direccion'=>'required|alpha',
            'sexo'=>'numeric',
            'fecha-nacimiento'=>'required|date',
            'salario'=>'numeric',
            'comision'=>'numeric',
            'meta'=>'numeric',
            'Email'=>'required|e-mail',
            'password'=>'required'
        ]);
        
        $pers=new \App\Models\Person;
        $pers->name=Input::get('nombre');
        $pers->last_name=Input::get('apellido');
        $pers->identification_card=Input::get('identidad');
        $pers->phone=Input::get('telefono');
        $pers->home_address=Input::get('direccion');
        $pers->gender=Input::get('sexo');
        $pers->birth_date=Input::get('fecha-nacimiento');
        $pers->save();

        $id=\App\Models\Person::where('identification_card',$pers->identification_card)->first();

        $emp=new \App\Models\Employee;
        $emp->id=$id->id;
        $emp->salary=Input::get('salario');
        $emp->save();

        $usr=new \App\Models\User;
        $usr->id=$id->id;
        $usr->email=Input::get('Email');
        $usr->password=Input::get('password');
        $usr->role_id=Input::get('rol');
        $usr->save();

        $sg=new \App\Models\SaleGoal;
        $sg->employee_id=$id->id;
        $sg->commission=Input::get('comision');
        $sg->sale_goal=Input::get('meta');
        $sg->car_type_id=1;
        $sg->save();
        
        return redirect('/empleados')->with('status','created');
    }

  
   

    public function edit(Request $request)
    {
        $id=Input::get('id');

        $request->validate([
            'nombre'=>'required',
            'apellido'=> 'required',
            'identidad'=>'required|unique:persons,identification_card|numeric',
            'telefono'=>'required',
            'direccion'=>'required|alpha',
            'sexo'=>'numeric',
            'fecha-nacimiento'=>'required|date',
            'salario'=>'numeric',
            'comision'=>'numeric',
            'meta'=>'numeric',
            'Email'=>'required|e-mail',
            'password'=>'required'
        ]);

        $pers=\App\Models\Person::where('id',$id)->first();
        $pers->name=Input::get('nombre');
        $pers->last_name=Input::get('apellido');
        $pers->identification_card=Input::get('identidad');
        $pers->phone=Input::get('telefono');
        $pers->home_address=Input::get('direccion');
        $pers->gender=Input::get('sexo');
        $pers->birth_date=Input::get('fecha-nacimiento');
        $pers->save();

        $emp=\App\Models\Employee::where('id',$id)->first();
        $emp->salary=Input::get('salario');
        $emp->save();

        $usr=\App\Models\User::where('id',$id)->first();
        $usr->email=Input::get('Email');
        $usr->password=Input::get('password');
        $usr->role_id=Input::get('rol');
        $usr->save();

        $sg=\App\Models\SaleGoal::where('employee_id',$id)->first();
        $sg->commission=Input::get('comision');
        $sg->sale_goal=Input::get('meta');
        $sg->car_type_id=1;
        $sg->save();

        return redirect('/empleados')->with('status','edited');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preEdit($id)
    {
        //$id=Input::get('empId');

        $pers=\App\Models\Person::where('id', $id)->first();
        $emp=\App\Models\employee::where('id', $id)->first();
        $usr=\App\Models\user::where('id',$id)->first();
        $sg=\App\Models\SaleGoal::where('employee_id',$id)->first();

        //return $id;

        return view('admin/edit_employee')
        ->with('holders',['id'=>$id,'name'=>$pers->name, 'last'=>$pers->last_name, 'id_card'=>$pers->identification_card, 'tel'=>$pers->phone, 'addr'=>$pers->home_address, 'birthdate'=>$pers->birth_date, 'salary'=>$emp->salary, 'commission'=>$sg->commission, 'goal'=>$sg->sale_goal, 'email'=>$usr->email]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pers=\App\Models\Person::where('id',$id)->first();
        $pers->delete();

        $emp=\App\Models\Employee::where('id', $id)->first();
        $emp->delete();

        $usr=\App\Models\User::where('id', $id)->first();
        $usr->delete();

        $sg=\App\Models\SaleGoal::where('employee_id', $id);
        foreach ($sg as $s) {
            $s->delete();
        }

        return redirect('/empleados')->with('status','deleted');
        //return "destroy: ".Input::get('empId');
    }
}
