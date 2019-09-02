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
        $employees=\App\Models\Employee::select('employees.*','users.*','persons.*','roles.name as rl','goals.sales_goal as sg','sellers.state as st', 'goals.commission as cm')
        ->join('users','users.id','=','employees.id')
        ->join('persons','persons.id','=','employees.id')
        ->join('roles','users.role_id','=','roles.id')
        ->join('goals','goals.seller_id','=','employees.id')
        ->join('sellers','sellers.id','=','employees.id')
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
        $emp->salary=0;
        $emp->hiring_date=\Carbon\Carbon::now();
        $emp->save();

        $usr= new \App\Models\User;
        $usr->id=($id->id);
        $usr->email=Input::get('Email');
        $usr->password=Input::get('password');
        $usr->role_id=Input::get('rol');
        $usr->save();
        //return $pers;
        //$emp=new Employee;
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
    public function edit($id)
    {
        //
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
        //
    }
}
