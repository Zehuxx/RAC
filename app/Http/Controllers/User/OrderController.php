<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\Car;
use App\Models\Detail;
use App\Models\Order;
use App\Models\OrderType;
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
            ->select(DB::raw("concat(c.name,' ',c.last_name) as customername"),'a.*','f.name as ordertypename')
            ->leftJoin('customers as b', 'a.customer_id', '=', 'b.id')
            ->leftJoin('order_types as f','a.order_type_id','f.id')
            ->leftJoin('persons as c', 'c.id', '=', 'b.id')
            ->whereNull('a.deleted_at')
            ->where(function($q)use($search){ 
                $q->where('f.name','like', '%'.$search.'%')
                ->orWhere('a.created_at','like', '%'.$search.'%')
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
    public function store(Request $request)
    {
       // dd($request->all());
         $rules_tipos = [
            'tipoorden'=>'required|integer|exists:order_types,id',
        ];

        $messages_tipos= [
            'tipoorden.required'=>"El campo 'Tipo orden' es obligatorio",
            'tipoorden.integer'=>'Valor no permitido',
            'tipoorden.exists'=>"Valor no permitido",
        ];

        $rules_cliente= [
            'cliente'=>'exists:customers,id',
            'tipoorden'=>'required|integer|exists:order_types,id',
        ];

        $messages_cliente= [
            'cliente.exists'=>'Valor no permitido',
            'tipoorden.required'=>"El campo 'Tipo orden' es obligatorio",
            'tipoorden.integer'=>'Valor no permitido',
            'tipoorden.exists'=>"Valor no permitido",
        ];

        $today = now()->format('Y-m-d');
        $rules_carro= [
            'fechasalida'=>'required|after_or_equal:'.$today,
            'fechareeingreso'=>'after_or_equal:fechasalida',
            'id'=>['required',
                function($attribute, $value, $fail) {
                        if($attribute == 'id'){
                            $car = Car::where($attribute,'=',1)->where('state_id','=', 1)->first();
                            if($car === null)
                                return $fail('Este carro no esta disponible.');
                        }

                },
            ],
        ];
        /*
        ,
                      
        */

        $messages_carro= [
            'fechareeingreso.after_or_equal'=>'La fecha de reeingreso debe ser igual o posterior a la fecha de salida',
            'fechasalida.required'=>"La fecha de salida es obligatoria.",
            'fechasalida.after_or_equal'=> "La fecha de salida debe ser igual o posterior a la fecha actual",
        ];

        $this->validate($request, $rules_tipos, $messages_tipos);
        $order= new Order();
        $order->order_type_id = $request->input("tipoorden");
        //dd($order->order_type_id);
        //2=ROBO
        //1=MANTENIMIENTO
        //EN ALGUNOS TIPOS DE ORDENES NO ES NECESARIO EL CLIENTE
        //EN CADA ORDEN QUE NO SE NECESITE UN CLIENTE SE REGRESARA LOS CARROS A UNA UBICACION LIBRE
        if ($order->order_type_id !==1 && $order->order_type_id !== 2) {
            $this->validate($request, $rules_cliente, $messages_cliente);
            $order->customer_id = $request->input("cliente");
        }

        if ($request->input("id")!==null) {
            //dd($request->all());
            $this->validate($request, $rules_carro, $messages_carro); 
            //SI SE HACE UNA ORDEN CON CARRO SE DEBE PONER EL CARRO EN ESTADO NO DISPONIBLE
            //LA UBICACION SE DEBE HABILITAR PARA OTRO CARRO
            $car=Car::find($request->input("id"));
            $car->state_id=2;
            $car->save();
            $ubicacion=Location::find($car->location_id);
            $ubicacion->availability=1;
            $ubicacion->save();
            //aqui costo
            $order->save();
            $detail= new Detail();
            $detail->order_id=$order->id;
            $detail->car_id= $request->input("id");
            $detail->employee_id=Auth::user()->id;
            $detail->departure_date= $request->input("fechasalida");
            $detail->reentry_date= $request->input("fechareeingreso");
            $detail->save();
        }else{
            $order->save();
        }

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
