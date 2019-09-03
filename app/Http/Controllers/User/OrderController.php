<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\Order;
use App\Models\OrderType;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;


class OrderController extends Controller
{ 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $orders=DB::table('orders as a')
            ->select(DB::raw("concat(c.name,' ',c.last_name) as customername,concat(e.name,' ',e.last_name) as employeename"),'a.*','f.name as ordertypename')
            ->join('customers as b', 'a.customer_id', '=', 'b.id')
            ->join('order_types as f','a.order_type_id','f.id')
            ->join('persons as c', 'c.id', '=', 'b.id')
            ->join('employees as d', 'a.employee_id', '=', 'd.id')
            ->join('persons as e', 'd.id', '=', 'e.id')
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){
                $q->where('f.name','like', '%'.$search.'%')
                ->orWhere('a.created_at','like', '%'.$search.'%')
                ->orWhere('e.last_name','like', '%'.$search.'%')
                ->orWhere('e.name','like', '%'.$search.'%')
                ->orWhere('c.name','like', '%'.$search.'%')
                ->orWhere('c.last_name','like', '%'.$search.'%');
            })
            //->toSql();
            ->paginate(10);
        //return $orders;
        return view('user.order_view',compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $carros=Car::where('state_id',1)->get();
        $clientes=Customer::all();
        $tiposordenes=OrderType::all();
        return view('user.new_order',compact('carros','clientes','modelos','tiposordenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $order= new Order();
        $order->order_type_id = $request->input("tipoorden");
        $order->customer_id = $request->input("cliente");
        $order->save();
        return redirect()->route('order index');
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
