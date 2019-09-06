<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarType;
use App\Models\Location;
use App\Models\Model;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;


class CarController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $cars=DB::table('cars as a')
            ->select('g.movement_id','g.deleted_at as detail_state','a.*','b.name as marca','c.name as tipo','d.location_code as ubicacion','e.name as modelo')
            ->leftjoin('car_brands as b', 'a.car_brand_id', '=', 'b.id')
            ->leftjoin('car_types as c', 'a.car_type_id', '=', 'c.id')
            ->leftjoin('locations as d', 'a.location_id', '=', 'd.id')
            ->leftjoin('models as e', 'a.model_id', '=', 'e.id')
            ->leftjoin(DB::raw("(SELECT g.* FROM details g WHERE g.created_at = (SELECT MAX(b.created_at) FROM details b WHERE b.car_id = g.car_id)) as g"), 'a.id', '=', 'g.car_id')
            //->leftJoin(DB::raw("(SELECT [...]) AS p"), 'p.post_id', '=', 'posts.id')
            ->orderby('year','desc')
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){
                $q->where('a.chassis','like','%'.$search.'%')
                ->orWhere('e.name','like','%'.$search.'%')
                ->orWhere('a.year','like','%'.$search.'%')
                ->orWhere('a.license_plate','like','%'.$search.'%')
                ->orWhere('b.name','like', '%'.$search.'%')
                ->orWhere('c.name','like', '%'.$search.'%')
                ->orWhere('d.location_code','like', '%'.$search.'%');
            })
            //->toSql();
            ->paginate(9);
            //dd($cars);
            //return $cars;
        return view('user.home',compact('cars'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $marcas=CarBrand::all();
        $tipos=CarType::all();
        $modelos=Model::all();
        return view('user.new_car',compact('marcas','tipos','modelos','ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        $car= new Car();
        $image= $request->file("imagen");
        if ($image) {
            $fileName = uniqid("img_", true).".".$image->getClientOriginalExtension();
            Image::make($image)->save( public_path('img/carros/'.$fileName));
            $car->image = $fileName;
        }
        $car->car_brand_id = $request->input("marca");
        $car->model_id = $request->input("modelo");
        $car->chassis = $request->input("chasis");
        $car->license_plate = $request->input("placa");
        $car->car_type_id = $request->input("tipo");
        $car->state_id = 2;
        $car->location_id = null;
        $car->year = $request->input("year").'-01-01';
        $car->save();
        return redirect()->route('user home');
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
        $carro=Car::find($id);
        $marcas=CarBrand::all();
        $tipos=CarType::all();
        $modelos=Model::all();
        return view('user.details',compact('carro','marcas','tipos','modelos'));
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
        $car= Car::find($id);
        $image= $request->file("imagen");
        if ($image) {
            if ($car->image) {
                $fileName=$car->image;

            }else{
                $fileName = uniqid("img_", true).".".$image->getClientOriginalExtension();

            }
            Image::make($image)->save( public_path('img/carros/'.$fileName));
            $car->image = $fileName;
        }
        $car->car_brand_id = $request->input("marca");
        $car->model_id = $request->input("modelo");
        $car->chassis = $request->input("chasis");
        $car->license_plate = $request->input("placa");
        $car->car_type_id = $request->input("tipo");
        $car->year = $request->input("year").'-01-01';
        $car->save();
        return redirect()->route('user home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
    }
}
