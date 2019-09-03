<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\Order;
use App\Models\CarType;
use App\Models\Detail;
use App\Models\Model;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;


class DetailController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request,$id)
    {
        $search = $request->input('search');
        $details=DB::table('details as a')
            ->select('a.*','b.year as year','b.license_plate as placa','b.image as imagen','c.location_code as ubicacion')
            ->join('cars as b', 'a.car_id', '=', 'b.id')
            ->join('locations as c', 'b.location_id', '=', 'c.id')
            ->where('a.order_id',$id)
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){
                $q->where('c.location_code','like', '%'.$search.'%')
                ->orWhere('b.license_plate','like', '%'.$search.'%')
                ->orWhere('b.year','like', '%'.$search.'%')
                ->orWhere('a.departure_date','like', '%'.$search.'%')
                ->orWhere('a.reentry_date','like', '%'.$search.'%');
            })
            //->toSql();
            ->paginate(10);

            //return $details;
        return view('user.order_details',compact('details'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request,$id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
