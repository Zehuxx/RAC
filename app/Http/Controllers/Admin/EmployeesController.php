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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        return "edit: ".Input::get('empId');
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
    public function destroy()
    {
        $id=\App\Models\Person::where('id', Input::get('empId'));
        $id->delete();

        $emp=\App\Models\Employee::where('id', Input::get('empId'));
        $emp->delete();

        $usr=\App\Models\User::where('id', Input::get('empId'));
        $usr->delete();

        $sg=\App\Models\SaleGoal::where('employee_id', Input::get('empId'));
        foreach ($sg as $s) {
            $s->delete();
        }

        return redirect('/empleados')->with('status','deleted');
        //return "destroy: ".Input::get('empId');
    }
}
