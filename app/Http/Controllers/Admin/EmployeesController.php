<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Input;

class EmployeesController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $search = $request->input('search');
        $employees=DB::table('employees as a')
        ->select('a.id as id','c.name as nombre','c.last_name as apellido','b.email as email','d.name as rol')
        ->join('users as b','a.id','=','b.id')
        ->join('persons as c','a.id','=','c.id')
        ->join('roles as d','b.role_id','=','d.id')
        ->whereNull('a.deleted_at')
        ->where(function($q)use($search){
                $q->where('c.name','like','%'.$search.'%')
                ->orWhere('c.last_name','like','%'.$search.'%')
                ->orWhere('b.email','like','%'.$search.'%')
                ->orWhere('d.name','like','%'.$search.'%');
            })
        //->toSql();
        ->paginate(10);
        //return dd($employees);
        return view('admin/employes')
        ->with('employees', $employees);
    }

  




    public function create()
    {
        return view('admin/add_employe');
    }
   
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        
        $pers=new Person();
        $pers->name= $request->input('nombre');
        $pers->last_name= $request->input('apellido');
        $pers->identification_card= $request->input('identidad');
        $pers->phone= $request->input('telefono');
        $pers->home_address= $request->input('direccion');
        if ($request->input('sexo')==1) {
            $pers->gender= 'M';
        }else{
            $pers->gender= 'F';
        }
        $pers->birth_date= $request->input('fechan');
        $pers->save();

        $id=$pers->id;

        $emp=new Employee();
        $emp->id=$id;
        $emp->salary=$request->input('salario');
        $emp->save();

        $usr=new User();
        $usr->id=$id;
        $usr->email=$request->input('email');
        $usr->password=bcrypt($request->input('password'));
        $usr->role_id=$request->input('rol');
        $usr->save();

        return redirect()->route('admin employees')->with('status','created');
    }

    public function edit($id)
    {
        $employee=DB::table('employees as a')
        ->select('a.id as id','a.salary as salario','c.*','b.email as email','b.role_id as rol')
        ->join('users as b','a.id','=','b.id')
        ->join('persons as c','a.id','=','c.id')
        ->join('roles as d','b.role_id','=','d.id')
        ->whereNull('a.deleted_at')
        ->where('a.id','=',$id)
        ->first();
        //return dd($employee);
        return view('admin.edit_employee',compact('employee'));
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

    public function update(EmployeeUpdateRequest $request, $id)
    {   
            $pers=Person::find($id);
            $pers->name= $request->input('nombre');
            $pers->last_name= $request->input('apellido');
            $pers->identification_card= $request->input('identidad');
            $pers->phone= $request->input('telefono');
            $pers->home_address= $request->input('direccion');

            if ($request->input('sexo')==1) {
                $pers->gender= 'M';
            }else{
                $pers->gender= 'F';
            }

            $pers->birth_date= $request->input('fechan');
            $pers->save();

            $emp=Employee::find($id);
            $emp->salary=$request->input('salario');
            $emp->save();

            $user=User::find($id);
            $user->email=$request->input('email');
            if ($request->input('password')) {
                $user->password=bcrypt($request->input('password'));
            }
            $user->role_id=$request->input('rol');
            $user->save();

            return redirect()->route('admin employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pers=Person::find($id);
        $pers->delete();

        $emp=Employee::find($id);
        $emp->delete();

        $usr=User::find($id);
        $usr->delete();

        if ((int)Auth::user()->id===(int)$id) {
               return redirect()->route('logout');
        }
        return redirect()->route('admin employees');
    }
}
