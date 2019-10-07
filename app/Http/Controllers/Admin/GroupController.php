<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarType;
use App\Models\Group;
use App\Models\SaleGoal;
use App\Models\Employee;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::paginate(10);

        return view('admin.groups', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carTypes = CarType::all();
        return view('admin.add_group', compact('carTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group();

        $group->name = $request->name;
        $group->car_type_id = $request->car_type;
        $group->commission = $request->comission;
        $group->sale_goal = $request->goal;

        $group->save();

        return redirect()->route('admin groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);

        $temp = DB::table('sale_goals as s')
        ->select('s.employee_id')
        ->whereNull('s.deleted_at')
        ->where('s.group_id', '=', $id);

        $employees=DB::table('employees as a')
        ->select('a.id as id','c.name as nombre','c.last_name as apellido','b.email as email','d.name as rol')
        ->join('users as b','a.id','=','b.id')
        ->join('persons as c','a.id','=','c.id')
        ->join('roles as d','b.role_id','=','d.id')
        ->whereNull('a.deleted_at')
        ->whereNotIn('a.id', $temp)
        ->paginate(10);

        $members = DB::table('employees as a')
        ->select('a.id as id','c.name as nombre','c.last_name as apellido','b.email as email','d.name as rol', 's.id as sale_goal')
        ->join('users as b','a.id','=','b.id')
        ->join('persons as c','a.id','=','c.id')
        ->join('roles as d','b.role_id','=','d.id')
        ->join('sale_goals as s', 's.employee_id', '=', 'a.id')
        ->whereNull('a.deleted_at')
        ->whereNull('s.deleted_at')
        ->where('s.group_id', '=', $id)
        ->paginate(10);

        return view('admin.show_group', compact('group', 'employees', 'members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $carTypes = CarType::all();

        return view('admin.edit_group', compact('group', 'carTypes'));
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
        $group = Group::find($id);

        $group->car_type_id = $request->car_type;
        $group->commission = $request->comission;
        $group->sale_goal = $request->goal;

        $group->update();

        return redirect()->route('admin groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return redirect()->route('admin groups');
    }

    public function addEmployee(Request $request, $id) {
        $temp = SaleGoal::onlyTrashed()
            ->where('employee_id', '=', $id)
            ->where('group_id', '=', $request->group)->first();

        if (!$temp) {
            $saleGoal = new SaleGoal();
            $saleGoal->employee_id = $id;
            $saleGoal->group_id = $request->group;
            $saleGoal->save();
        } else {
            $temp->restore();
        }

        return redirect()->route('admin groups show', $request->group);
    }

    public function removeEmployee($id) {
        $saleGoal = SaleGoal::find($id);

        $saleGoal->delete();

        return redirect()->route('admin groups show', $saleGoal->group_id);
    }
}
