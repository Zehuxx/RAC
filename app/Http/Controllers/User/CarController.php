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
        $cars=Car::where('state_id',1)
                   ->search($search)
                   ->orderby('year','desc')
                   ->paginate(9);
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
        $ubicaciones=Location::where('availability',1)->get();
        $estados=State::all();
        return view('user.new_car',compact('marcas','tipos','modelos','ubicaciones','estados'));
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
        $car->state_id = $request->input("estado");
        $car->location_id = $request->input("ubicacion");
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
        $ubicaciones=Location::where('availability',1)->get();
        $estados=State::all();
        return view('user.details',compact('carro','marcas','tipos','modelos','ubicaciones','estados'));
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
        $car->state_id = $request->input("estado");
        $car->location_id = $request->input("ubicacion");
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
