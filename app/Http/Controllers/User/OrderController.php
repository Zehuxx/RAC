<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Location;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Facades\Validator;
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
            ->select(DB::raw("concat(c.name,' ',c.last_name) as customername"),'a.*')
            ->leftJoin('customers as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('persons as c', 'c.id', '=', 'b.id')
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){ 
                $q->where('a.created_at','like', '%'.$search.'%')
                ->orWhere('c.name','like', '%'.$search.'%')
                ->orWhere('c.last_name','like', '%'.$search.'%');
            })
            ->orderby('a.created_at','desc')
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
        $clientes=Customer::all();
        return view('user.new_order',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules_cliente= [
            'cliente'=>'exists:customers,id',
        ];

        $messages_cliente= [
            'cliente.exists'=>'Valor no permitido',
        ];
        $this->validate($request, $rules_cliente, $messages_cliente);
        $order= new Order();
        $order->customer_id = $request->input("cliente");
        $order->cost=0;
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
